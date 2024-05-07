<?php

function sec_session_start()
{
   $session_name = 'sec_session_id';
   $secure = false; // KittyGram does not use https
   $httponly = true; // hide id session from javascript
   ini_set('session.use_only_cookies', 1);
   $cookieParams = session_get_cookie_params(); // read cookies
   session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
   session_name($session_name);
   session_start();
   session_regenerate_id(); // Prevents hijacking
}

function login($username, $password, DatabaseHelper $dbh)
{
   $accountResult = $dbh->getAccountFromUsername($username);
   if ($accountResult) {
      $userId = $accountResult['user_id'];
      $dbPassword = $accountResult['password'];
      $salt = $accountResult['salt'];
      $password = hash('sha512', $password.$salt);
      if ($accountResult['isDisabled']) {
            // Account tried to login too many times
            return false;
      } else {
         if ($dbPassword == $password) {
            // Password corretta!            
            $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
            $user_id = preg_replace("/[^0-9]+/", "", $userId); // ci proteggiamo da un attacco XSS
            $_SESSION['user_id'] = $userId;
            $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
            $_SESSION['username'] = $username;
            $_SESSION['login_string'] = hash('sha512', $password.$user_browser); // Contains user's browser info codified with it's password
            // Login eseguito con successo.
            return true;
         } else {
            // Wrong password, add a new login attempt
            $now = time();
            $dbh->addLoginAttempt($userId, $now);
            // It will return false at the end of function
         }
      }
   }

   // Else: no user found
   return false;
}

function login_check(mysqli $db)
{
   // Verifica che tutte le variabili di sessione siano impostate correttamente
   if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
      $userId = $_SESSION['user_id'];
      $login_string = $_SESSION['login_string'];
      $username = $_SESSION['username'];
      $user_browser = $_SERVER['HTTP_USER_AGENT'];
      if ($stmt = $db->prepare("SELECT password FROM members WHERE id = ? LIMIT 1")) {
         $stmt->bind_param('i', $userId); // esegue il bind del parametro '$userId'.
         $stmt->execute(); // Esegue la query creata.
         $stmt->store_result();

         $password = 0;
         if ($stmt->num_rows == 1) { 
            // If user exists bind query result to $password
            $stmt->bind_result($password);
            $stmt->fetch();
            $login_check = hash('sha512', $password.$user_browser);
            if ($login_check == $login_string) {
               // Login successful
               return true;
            }
         }
      }
   }

   return false;
}

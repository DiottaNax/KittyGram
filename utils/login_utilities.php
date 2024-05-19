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
   $accountResult = $dbh->getLoginInfo($username);
   // Initialize loginResult with default values
   $loginResult['disabled'] = false;
   $loginResult['success'] = false;
   if ($accountResult) {
      $userId = $accountResult['id'];
      $dbPassword = $accountResult['password'];
      $dbUsername = $accountResult['username'];
      $salt = $accountResult['salt'];
      $password = hash('sha512', $password.$salt);

      if ($accountResult['isDisabled']) {
         // Account tried to login too many times
         $loginResult['disabled'] = true;
      } else {
         if ($dbPassword == $password) {
            // Password corretta!
            $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
            $user_id = preg_replace("/[^0-9]+/", "", $userId); // ci proteggiamo da un attacco XSS
            $_SESSION['user_id'] = $user_id;
            $sessionUsername = preg_replace("/[^a-zA-Z0-9_\-\.]+/", "", $dbUsername); // ci proteggiamo da un attacco XSS
            $_SESSION['username'] = $sessionUsername;
            $_SESSION['login_string'] = hash('sha512', $password.$user_browser); // Contains user's browser info codified with it's password
            $loginResult['success'] = true;
         } else {
            // Wrong password, add a new login attempt
            $now = date('Y-m-d H:i:s', time());
            $dbh->addLoginAttempt($userId, $now);
         }
      }
   }

   return $loginResult;
}

function login_check(mysqli $db)
{
   // Verifica che tutte le variabili di sessione siano impostate correttamente
   if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
      $userId = $_SESSION['user_id'];
      $login_string = $_SESSION['login_string'];
      $username = $_SESSION['username'];
      $user_browser = $_SERVER['HTTP_USER_AGENT'];
      if ($stmt = $db->prepare("SELECT password FROM account WHERE id = ? LIMIT 1")) {
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

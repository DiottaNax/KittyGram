<?php

class DatabaseHelper{
    private $db;
    
    public function __construct($dbname, $servername = "localhost", $username = "root", $password = "", $port = 3306){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    private function checkBrute($user_id)
    {
        $now = time();
        // Vengono analizzati tutti i tentativi di login a partire dalle ultime due ore.
        $valid_attempts = $now - (2 * 60 * 60);
        if ($stmt = $this->db->prepare("SELECT date_and_time FROM login_attempts WHERE user_id = ? AND date_and_time > '$valid_attempts'")) {
            $stmt->bind_param('i', $user_id);
            // Eseguo la query creata.
            $stmt->execute();
            $result = $stmt->get_result();
            // Verifico l'esistenza di più di 5 tentativi di login falliti.
            if ($result->num_rows > 5) {
                return true;
            }
        }

        return false;
    }

    public function getAccountFromUsername($username)
    {
        $stmt = $this->db->prepare("SELECT user_id, username, password, salt FROM account WHERE username = ? LIMIT 1");
        $lowerUsername = strtolower($username);
        $stmt->bind_param('s', $lowerUsername); // esegue il bind del parametro '$email'.
        $stmt->execute(); // esegue la query appena creata.
        $stmt->store_result();
        $account = array();
        $stmt->bind_result($account['id'], $account['username'], $account['password'], $account['salt']); // recupera il risultato della query e lo memorizza nelle relative variabili.
        $stmt->fetch();
        $account['isDisabled'] = $this->checkBrute($account['id']) == true;
        return $account;
    }

    public function getAccountFromUserOrEmail($userOrEmail)
    {
        $stmt = $this->db->prepare("SELECT user_id, username, password, salt FROM account WHERE username = ? OR email = ? LIMIT 1");
        $stmt->bind_param('ss', $userOrEmail, $userOrEmail); // esegue il bind del parametro '$email'.
        $stmt->execute(); // esegue la query appena creata.
        $stmt->store_result();
        $account = array();
        $stmt->bind_result($account['id'], $account['username'], $account['password'], $account['salt']); // recupera il risultato della query e lo memorizza nelle relative variabili.
        $stmt->fetch();
        $account['isDisabled'] = $this->checkBrute($account['id']) == true;
        return $account;
    }

    public function addLoginAttempt($userId, $time)
    {
        $this->db->query("INSERT INTO login_attempts (user_id, date_and_time) VALUES ('$userId', '$time')");
    }

    public function isUsernameTaken($username)
    {
        $query = "SELECT * FROM ACCOUNT WHERE username = ?";
        $lowerUsername = strtolower($username);
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $lowerUsername);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isEmailTaken($email)
    {
        $query = "SELECT * FROM ACCOUNT WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addAccount($username, $email, $name, $surname, $password, $salt)
    {
        $query = "INSERT INTO ACCOUNT (username, email, first_name, last_name, password, salt) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);
        $lowerUsername = strtolower($username);
        $stmt->bind_param("ssssss", $lowerUsername, $email, $name, $surname, $password, $salt);

        if ($stmt->execute()) {
            return $stmt->insert_id;
        } else {
            echo "Errore nell'inserimento dell'account: " . $stmt->error;
            return 0;
        }
    }
    public function getNotificationsById($user_id) {
        $query = "
            SELECT notification_id,message,post_id,from_user_id as user_from_id,ur.username as username_from,seen,
            for_user_id as user_for_id,ui.username as username_for
            FROM NOTIFICATION INNER JOIN ACCOUNT ui ON NOTIFICATION.for_user_id = ui.user_id 
            INNER JOIN ACCOUNT ur ON NOTIFICATION.from_user_id = ur.user_id
            WHERE NOTIFICATION.for_user_id = ? AND NOTIFICATION.seen = 0
            ORDER BY date, notification_id
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function viewedNotification($idNotification){
        $query = "UPDATE notification SET seen = 1 WHERE notification_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idNotification);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }

    public function getMediaFromId($media_id) {
        $query = "SELECT file_name FROM MEDIA WHERE media_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $media_id);
        $stmt->execute();
        $stmt->bind_result($file_name);
        $stmt->fetch();

        return $file_name;
    }

    function getMediasByPostId($post_id) {
        $query = "SELECT file_name FROM MEDIA WHERE post_id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
}


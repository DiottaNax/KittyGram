<?php

class DatabaseHelper
{
    private $db;

    public function __construct($dbname, $servername = "localhost", $username = "root", $password = "", $port = 3306)
    {
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

    public function getLoginInfo($username)
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
        return $stmt->num_rows() > 0 ? $account : false;
    }

    public function getAccountFromUsername($username)
    {
        $query = "SELECT user_id as id, username, file_name as pic, first_name, last_name, user_bio, email FROM account
                    LEFT JOIN media ON account.profile_pic_id = media.media_id
                    WHERE account.username = ?
                    LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]; // Return the first element of the array
    }

    public function getAccountFromId($user_id)
    {
        $query = "SELECT user_id as id, username, file_name as pic, first_name, last_name, user_bio, email FROM account
                    LEFT JOIN media ON account.profile_pic_id = media.media_id
                    WHERE account.user_id = ?
                    LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]; // Return the first element of the array
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
    public function getNotificationsById($user_id)
    {
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
    public function viewedNotification($idNotification)
    {
        $query = "UPDATE notification SET seen = 1 WHERE notification_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idNotification);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }

    public function userLikesPost($idPost, $userId)
    {
        $query = "
            SELECT COUNT(*) AS numberLikes
            FROM post_like
            WHERE user_id = ? AND post_id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $userId, $idPost);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row["numberLikes"];
    }

    public function addLike($post_id, $user_id)
    {
        $query = "
            INSERT INTO post_like (post_id, user_id)
            VALUES (?, ?)
        ";
        //insert a new like

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $post_id, $user_id);
        $stmt->execute();
        $result = array("user_id" => $user_id, "post_id" => $post_id);

        return $result;
    }

    public function removelike($post_id, $user_id)
    {
        $query = "
            DELETE FROM post_like
            WHERE post_id = ? AND user_id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $post_id, $user_id);
        $result = $stmt->execute();

        return $result;
    }

    public function getPostOwnerId($post_id)
    {
        $query = "
            SELECT user_id
            FROM post
            WHERE post_id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Utilizza fetch_assoc per ottenere un'associazione chiave-valore
        $row = $result->fetch_assoc();

        // Restituisci direttamente il valore dell'username
        return $row["user_id"];
    }

    public function addNotification($message, $usernameReceiver, $usernameSender, $post_id = null)
    {
        $date = date('Y-m-d H:i:s', time());
        $query = "
            INSERT INTO notification (message, for_user_id, from_user_id, post_id, date)
            VALUES (?, ?, ?, ?, '$date')
        ";
        //insert a new notification

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssi", $message, $usernameReceiver, $usernameSender, $post_id);
        $stmt->execute();

        return $stmt->insert_id;
    }



    public function getHome($user_id)
    {
        $query = "SELECT POST.post_id, POST.description, POST.date, MEDIA.file_name,ACCOUNT.username, ACCOUNT.user_id
        FROM POST
        JOIN ACCOUNT ON POST.user_id = ACCOUNT.user_id
        JOIN FOLLOW ON ACCOUNT.user_id = FOLLOW.followed
        JOIN MEDIA ON POST.post_id = MEDIA.post_id
        WHERE FOLLOW.follower = ?
        ORDER BY POST.date DESC";


        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMediaFromId($media_id)
    {
        $query = "SELECT file_name FROM MEDIA WHERE media_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $media_id);
        $stmt->execute();
        $stmt->bind_result($file_name);
        $stmt->fetch();

        return $file_name;
    }

    function getMediasByPostId($post_id)
    {
        $query = "SELECT file_name FROM MEDIA WHERE post_id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $files = [];

        while ($row = $result->fetch_assoc()) {
            $files[] = $row['file_name'];
        }

        return $files;
    }

    public function addMedia($fileName, $post_id)
    {
        $query = "INSERT INTO MEDIA (file_name,post_id) VALUES (?,?)";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $fileName, $post_id);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function getFollowedByUsername($username)
    {
        $query = "SELECT followed FROM FOLLOW JOIN ACCOUNT ON FOLLOW.follower = ACCOUNT.user_id WHERE ACCOUNT.username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getUserByUsername($username)
    {
        $query = "
            SELECT first_name, last_name, description, email, user_id, profile_pic_id
            FROM account 
            WHERE username = ?
        ";
        //get all the user's data by username, except the password and the salt

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getFollowerFromId($user_id)
    {
        $stmt = $this->db->prepare("SELECT COUNT(followed) AS num_followed FROM FOLLOW WHERE followed = ?");
        $stmt->bind_param('i', $user_id); // esegue il bind del parametro '$email'.
        $stmt->execute(); // esegue la query appena creata.
        $stmt->bind_result($followers); // recupera il risultato della query e lo memorizza nelle relative variabili.
        $stmt->fetch();

        return $followers;
    }

    public function getFollowingFromId($user_id)
    {
        $stmt = $this->db->prepare("SELECT COUNT(follower) AS num_following FROM FOLLOW WHERE follower = ?");
        $stmt->bind_param('i', $user_id); // esegue il bind del parametro '$email'.
        $stmt->execute(); // esegue la query appena creata.
        $stmt->bind_result($following); // recupera il risultato della query e lo memorizza nelle relative variabili.
        $stmt->fetch();

        return $following;
    }

    public function getFollowedAccount($user_id)
    {
        $query = "SELECT username, file_name
                    FROM account LEFT JOIN follow ON account.user_id = follow.followed
                    LEFT JOIN media ON account.profile_pic_id = media.media_id
                    WHERE follow.follower = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFollowersAccount($user_id)
    {
        $query = "SELECT username, file_name
                    FROM account LEFT JOIN follow ON account.user_id = follow.follower
                    LEFT JOIN media ON account.profile_pic_id = media.media_id
                    WHERE follow.followed = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNumPostFromId($user_id)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS num_posts FROM POST WHERE user_id = ?");
        $stmt->bind_param('i', $user_id); // esegue il bind del parametro '$email'.
        $stmt->execute(); // esegue la query appena creata.
        $stmt->bind_result($numPost); // recupera il risultato della query e lo memorizza nelle relative variabili.
        $stmt->fetch();

        return $numPost;
    }

    public function addPost($user_id, $description, $city)
    {
        $query = "INSERT INTO POST (user_id, description, date) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $date = date("Y-m-d");
        $stmt->bind_param("iss", $user_id, $description, $date);
        $stmt->execute();
        return $this->db->insert_id;
    }

    public function deletePost($post_id)
    {
        $query = "DELETE FROM POST WHERE post_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function searchAccountStartingWith($preamble)
    {
        // Search all users whose username, name or surname starts with preamble in this order of matching
        $query = "SELECT username, file_name 
                    FROM account
                    LEFT JOIN media ON account.profile_pic_id = media.media_id
                    WHERE account.user_id != ?
                        AND (account.username LIKE ?
                        OR account.first_name LIKE ?
                        OR account.last_name LIKE ?)
                    ORDER BY 
                        CASE
                            WHEN account.username LIKE ? THEN 1
                            WHEN account.first_name LIKE ? THEN 2
                            WHEN account.last_name LIKE ? THEN 3
                            ELSE 4
                        END;";
        $pattern = $preamble . "%"; // Make a SQL-Pattern-like
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("issssss", $_SESSION['user_id'], $pattern, $pattern, $pattern, $pattern, $pattern, $pattern);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    private function getComments($post_id) {
        $query = "SELECT `username`, `file_name` as 'profile_pic', `message`, `date` FROM `comment`
                    LEFT JOIN (account LEFT JOIN media on account.profile_pic_id = media.media_id)
                        ON comment.user_id = account.user_id
                    WHERE comment.post_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt -> get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPost ($post_id) {
        $query = "SELECT * FROM `post` WHERE post.post_id = ? LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]; // first row of results
        if(isset($result['user_id'])) {
            $result['owner'] = $this->getAccountFromId($result['user_id']);
            $result['media'] = $this->getMediasByPostId($post_id);
            $result['comment'] = $this->getComments($post_id);
        }

        return $result;
    }

    public function getUserPosts($idOrUsername) {
        $query = "SELECT post_id FROM post
                    LEFT JOIN account ON post.user_id = account.user_id
                    WHERE account.username = ?
                        OR account.user_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $idOrUsername, $idOrUsername);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        foreach($result as $post) {
            $post['medias'] = $this->getMediasByPostId($post['post_id']);
        }

        return $result;
    }


}


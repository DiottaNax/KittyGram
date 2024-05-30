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

    public function passwordsMatch($username, $password)
    {
        $login_info = $this->getLoginInfo($username);

        if ($login_info) {
            $encrypted = hash('sha512', $password . $login_info['salt']);
            return $encrypted == $login_info['password'];
        }

        return false;
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

    public function getIdFromUsername($username)
    {
        $stmt = $this->db->prepare("SELECT user_id FROM account WHERE account.username = ? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0];
        return count($result) > 0 ? $result['user_id'] : 0;
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
            ORDER BY date DESC, notification_id
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

    public function addComment($text, $idPost, $username)
    {
        $query = "
            INSERT INTO comment (message, post_id, user_id, date)
            VALUES (?, ?, ?, ?)
        ";
        $date = date('Y-m-d H:i', time());
        //insert a new comment
        $writer_id = $this->getIdFromUsername($username);
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("siis", $text, $idPost, $writer_id, $date);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function getCommentsById($idPost)
    {
        $query = "
            SELECT a.username, a.user_id, c.comment_id, c.date, c.message, m.file_name AS profile_pic
            FROM comment c 
            INNER JOIN account a ON c.user_id = a.user_id
            LEFT JOIN media m ON a.profile_pic_id = m.media_id
            WHERE c.post_id = ?
            ORDER BY c.date DESC
            ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $idPost);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
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



    public function getFeed($user_id)
    {
        // Query per ottenere i post che non sono nella tabella adoptions
        $queryPosts = "SELECT POST.post_id
                   FROM POST
                   JOIN ACCOUNT ON POST.user_id = ACCOUNT.user_id
                   JOIN FOLLOW ON ACCOUNT.user_id = FOLLOW.followed
                   WHERE FOLLOW.follower = ?
                     AND POST.post_id NOT IN (SELECT post_id FROM adoption)
                   ORDER BY POST.date DESC";

        // Prepara ed esegui la query per i post
        $stmtPosts = $this->db->prepare($queryPosts);
        $stmtPosts->bind_param('i', $user_id);
        $stmtPosts->execute();
        $posts_id = $stmtPosts->get_result()->fetch_all(MYSQLI_ASSOC);

        // Query per ottenere i post che sono nella tabella adoptions
        $queryAdoptions = "SELECT POST.post_id
                       FROM POST
                       JOIN ACCOUNT ON POST.user_id = ACCOUNT.user_id
                       JOIN FOLLOW ON ACCOUNT.user_id = FOLLOW.followed
                       WHERE FOLLOW.follower = ?
                         AND POST.post_id IN (SELECT post_id FROM adoption)
                       ORDER BY POST.date DESC";

        // Prepara ed esegui la query per le adozioni
        $stmtAdoptions = $this->db->prepare($queryAdoptions);
        $stmtAdoptions->bind_param('i', $user_id);
        $stmtAdoptions->execute();
        $adoptions_id = $stmtAdoptions->get_result()->fetch_all(MYSQLI_ASSOC);

        // Crea l'array associativo feed
        $feed = array('posts' => array(), 'adoptions' => array());

        // Popola l'array posts con i risultati della prima query
        foreach ($posts_id as $post_id) {
            $feed['posts'][] = $this->getPost($post_id['post_id']);
        }

        // Popola l'array adoptions con i risultati della seconda query
        foreach ($adoptions_id as $post_id) {
            $feed['adoptions'][] = $this->getAdoption($post_id['post_id']);
        }

        return $feed;
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

    public function addMedia($fileName, $post_id = null)
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

    public function addPost($user_id, $description, $city_id = null)
    {
        $query = "INSERT INTO POST (user_id, description, date) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $date = date("Y-m-d H:i");
        $stmt->bind_param("iss", $user_id, $description, $date);
        $stmt->execute();
        $post_id = $stmt->insert_id;
        $stmt->close();

        if (isset($city_id)) {
            $query = "INSERT INTO adoption (post_id, city_id) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ii", $post_id, $city_id);
            $stmt->execute();
            $stmt->close();
        }

        return $post_id;
    }

    public function deletePost($post_id)
    {
        $query = "DELETE FROM POST WHERE post_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        return $stmt->execute();
    }

    public function isCityRegistered($nameOrCap)
    {
        $query = "SELECT city_id FROM city WHERE city.city_name = ? OR city.city_cap = ? LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $nameOrCap, $nameOrCap);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return isset($result[0]) ? $result[0] : 0;
    }

    public function searchCityStartingWith($preamble)
    {
        $query = "SELECT city_name, city_cap FROM city
                    WHERE city.city_name LIKE ? OR city.city_cap LIKE ?
                    ORDER BY city.city_name LIMIT 5;";
        $pattern = trim($preamble . "%"); // Make a SQL-Pattern-like
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $pattern, $pattern);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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
                        END
                    LIMIT 5;";
        $pattern = $preamble . "%"; // Make a SQL-Pattern-like
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("issssss", $_SESSION['user_id'], $pattern, $pattern, $pattern, $pattern, $pattern, $pattern);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    private function getComments($post_id)
    {
        $query = "SELECT `username`, `file_name` as 'profile_pic', `message`, `date` FROM `comment`
                    LEFT JOIN (account LEFT JOIN media on account.profile_pic_id = media.media_id)
                        ON comment.user_id = account.user_id
                    WHERE comment.post_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function markAsAdopted($post_id) {
        $query = "UPDATE adoption SET adopted = '1' WHERE adoption.post_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        return $stmt->execute();
    }

    public function getAdoptionRequests($post_id)
   
    {
        $stmt = $this->db->prepare("SELECT * FROM user_adopting WHERE post_id = ?;");
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function removeAdoptionRequest($post_id, $submitter_id)
    {
        $query = "DELETE FROM user_adopting WHERE post_id = ? AND user_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $post_id, $submitter_id);
        return $stmt->execute();
    }

    public function addAdoptionRequest($post_id, $submitter_id, $phone_number, $presentation)
    {
        $query = "INSERT INTO user_adopting(post_id, user_id, cell, presentation) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iiss", $post_id, $submitter_id, $phone_number, $presentation);
        return $stmt->execute();
    }

    public function requestAlreadyPresent($post_id, $submitter)
    {
        // Query per verificare se esiste già una richiesta di adozione
        $query = "SELECT COUNT(*) as count 
              FROM `user_adopting`
              LEFT JOIN account ON user_adopting.user_id = account.user_id
              WHERE user_adopting.post_id = ?
                AND (account.username = ? OR account.user_id = ?)";


        $stmt = $this->db->prepare($query);
        $stmt->bind_param("isi", $post_id, $submitter, $submitter);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        return $result['count'] > 0;
    }


    public function isAdoption($post_id)
    {
        // Query per verificare se il post_id è presente nella tabella adoptions
        $query = "SELECT COUNT(*) as count
              FROM adoption
              WHERE post_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        // Restituisce true se il post_id è presente nella tabella adoptions, altrimenti false
        return $result['count'] > 0;
    }


    public function getAdoption($post_id)
    {
        $query = "SELECT post.post_id, description, date, user_id, adopted, city_name
                    FROM adoption 
                    LEFT JOIN post ON adoption.post_id = post.post_id
                    LEFT JOIN city ON adoption.city_id = city.city_id
                    WHERE adoption.post_id = ?
                    LIMIT 1;";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]; // first row of results
        if (isset($result['user_id'])) {
            $result['owner'] = $this->getAccountFromId($result['user_id']);
            $result['media'] = $this->getMediasByPostId($post_id);
            $result['comment'] = $this->getComments($post_id);
        }

        return $result;
    }

    public function getPost($post_id)
    {
        $query = "SELECT * FROM `post` WHERE post.post_id = ? LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]; // first row of results
        if (isset($result['user_id'])) {
            $result['owner'] = $this->getAccountFromId($result['user_id']);
            $result['media'] = $this->getMediasByPostId($post_id);
            $result['comment'] = $this->getComments($post_id);
        }

        return $result;
    }

    public function getUserPosts($idOrUsername)
    {
        // Query per ottenere tutti i post dell'utente
        $query = "SELECT post.post_id, 
                     CASE 
                        WHEN adoption.post_id IS NOT NULL THEN 1 
                        ELSE 0 
                     END AS is_adoption 
              FROM post
              LEFT JOIN account ON post.user_id = account.user_id
              LEFT JOIN adoption ON post.post_id = adoption.post_id
              WHERE account.username = ?
                 OR account.user_id = ?
              ORDER BY post.post_id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $idOrUsername, $idOrUsername);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        // Crea l'array associativo feed
        $userPosts = array('posts' => array(), 'adoptions' => array());

        // Popola gli array posts e adoptions
        foreach ($result as &$post) {
            $post['media'] = $this->getMediasByPostId($post['post_id']);
            if ($post['is_adoption']) {
                $userPosts['adoptions'][] = $post;
            } else {
                $userPosts['posts'][] = $post;
            }
        }

        return $userPosts;
    }


    public function addFollow($follower, $followed)
    {
        $follower_id = $this->getIdFromUsername($follower);
        $followed_id = $this->getIdFromUsername($followed);

        if (isset($follower_id, $followed_id)) {
            $query = "INSERT INTO follow (follower, followed) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ii", $follower_id, $followed_id);
            $stmt->execute();
            return true;
        }

        return false;
    }

    public function removeFollow($follower, $followed)
    {
        $follower_id = $this->getIdFromUsername($follower);
        $followed_id = $this->getIdFromUsername($followed);

        if (isset($follower_id, $followed_id)) {
            $query = "DELETE FROM follow WHERE follow.follower = ? AND follow.followed = ?;";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ii", $follower_id, $followed_id);
            $stmt->execute();
            return true;
        }

        return false;
    }

    public function isFollowing($follower, $followed)
    {
        $follower_id = $this->getIdFromUsername($follower);
        $followed_id = $this->getIdFromUsername($followed);

        if (isset($follower_id, $followed_id)) {
            $query = "SELECT * FROM follow WHERE follow.follower = ? AND follow.followed = ? LIMIT 1;";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ii", $follower_id, $followed_id);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows();
        }

        return 0;
    }

    private function updateUsername($oldUsername, $newUsername)
    {
        if ($this->isUsernameTaken($newUsername))
            return false;

        $query = "UPDATE account SET account.username = ? WHERE account.username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $newUsername, $oldUsername);
        $stmt->execute();
        $stmt->close();

        return true;
    }

    private function updateEmail($user_id, $newEmail)
    {
        if ($this->isEmailTaken($newEmail))
            return false;

        $query = "UPDATE account SET account.email = ? WHERE account.user_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $newEmail, $user_id);
        $stmt->execute();
        $stmt->close();

        return true;
    }

    public function updateProfileInfo($username, $newUsername = null, $name = null, $surname = null, $bio = null, $email = null, $picName = null, $password = null, $salt = null)
    {
        $query = "UPDATE account SET account.password = ?, account.salt = ?, account.first_name = ?, account.last_name = ?, account.user_bio = ? WHERE account.user_id = ?; ";
        $account = $this->getAccountFromUsername($username);
        $loginInfo = $this->getLoginInfo($username);
        $user_id = $loginInfo['id'];
        $queryUsername = $username;
        $queryEmail = $account['email'];
        $queryPassword = $loginInfo['password'];
        $querySalt = $loginInfo['salt'];

        if (!empty($account)) {
            if (!empty($newUsername)) {
                $queryUsername = $this->updateUsername($username, $newUsername) ? $username : $newUsername;
            }

            if (!empty($email)) {
                $queryEmail = $this->updateEmail($user_id, $email) ? $email : $account['email'];
            }

            // per ognuno queryval = !empty(val) ? val : account['val']
            $queryName = !empty($name) ? $name : $account['first_name'];
            $querySurname = !empty($surname) ? $surname : $account['last_name'];
            $queryBio = !empty($bio) ? $bio : $account['user_bio'];

            if (!empty($password) && !empty($salt)) {
                $queryPassword = $password;
                $querySalt = $salt;
            }

            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sssssi", $queryPassword, $querySalt, $queryName, $querySurname, $queryBio, $user_id);
            $stmt->execute();

            $pic_id = 0;
            if (!empty($picName)) {
                $pic_id = $this->addMedia($picName);
                $picStmt = $this->db->prepare("UPDATE account SET account.profile_pic_id = ? WHERE account.user_id = ?");
                $picStmt->bind_param("ii", $pic_id, $user_id);
                return $stmt->execute() && $picStmt->execute();
            }

            $stmt->execute();

            $query_params = [$queryUsername, $queryName, $querySurname, $queryBio, $queryEmail, $queryPassword, $querySalt, $picName];
            return $query_params;
        }



        return false;
    }
}
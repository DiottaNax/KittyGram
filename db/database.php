<?php
class DatabaseHelper{
    public $db;
    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }
    /**
    * User CRUD
    */
    public function getUserById($userId) {
        $query = "SELECT a.username, a.description, a.profile_img
        FROM user,
        WHERE user_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    >


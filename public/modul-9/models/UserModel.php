<?php

require_once "Database.php";

class UserModel extends Database
{

    public function login($email, $password){
        $user = $this->getSingleUser($email)->fetch_assoc();
        //if (password_verify($password, $user['password'])) {
        if ($password == $user['password']){
            return true;
        } else {
            return false;
        }
    }

    public function registerUser($email, $password){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = $this->addUser($email, $hashedPassword);
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    public function addUser($email, $password){
        $sql = "INSERT INTO Users (username, password) VALUES (?, ?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('ss', $email,$password);
        return $stmt->execute();
    }

    public function getSingleUser($email){
        $sql = "SELECT Users.userid, username, password, memberid FROM Users WHERE 
                            Users.username = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
}
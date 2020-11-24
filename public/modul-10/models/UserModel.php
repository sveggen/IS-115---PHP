<?php

require_once "Database.php";

class UserModel extends Database
{

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password){
        $user = $this->getSingleUser($email)->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $email
     * @param $password
     * @param $memberid
     * @return bool
     */
    public function registerUser($email, $password, $memberid){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = $this->addUser($email, $hashedPassword, $memberid);
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $email
     * @param $password
     * @param $memberid
     * @return bool
     */
    public function addUser($email, $password, $memberid){
        $sql = "INSERT INTO Users (username, password, memberid) VALUES (?, ?, ?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('ssi', $email,$password, $memberid);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    /**
     * @param $email
     * @return false|mysqli_result
     */
    public function getSingleUser($email){
        $sql = "SELECT Users.userid, password, memberid FROM Users WHERE 
                            Users.username = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

}
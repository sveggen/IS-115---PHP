<?php

require_once "Database.php";
require_once __DIR__ . '/../../../ConfigVariables.php';

class UserModel extends Database
{

    /**
     * Verifies password and logs user in.
     */
    public function login($email, $password){
        $pepper = getConfigVariable();
        $pepperedPassword = hash_hmac("sha256", $password, $pepper); // adds pepper
        $user = $this->getSingleUserCredentials($email)->fetch_assoc();
        if (password_verify($pepperedPassword, $user['password'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *  Hashes password and calls function to register user to database.
     */
    public function registerUser($email, $password, $memberid){
        $pepper = getConfigVariable(); // returns pepper from config file
        $pepperedPassword = hash_hmac("sha256", $password, $pepper); // adds pepper
        $hashedPassword = password_hash($pepperedPassword, PASSWORD_BCRYPT);
        $user = $this->addUser($email, $hashedPassword, $memberid);
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Adds user to database.
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
     *  Returns one user from the database.
     */
    public function getSingleUserCredentials($email){
        $sql = "SELECT Users.userid, password, memberid FROM Users WHERE 
                            Users.username = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    /**
     * Returns single user and all linked data.
     */
    public function getSingleUserComplete($email){
        $sql = "SELECT * FROM Users JOIN Members M on Users.memberid = M.memberid 
    JOIN Address A on M.addressid = A.addressid JOIN Zipcoderegister Z on A.zipcode = Z.zipcode
    WHERE Users.username = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

}
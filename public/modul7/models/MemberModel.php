<?php

require_once "Database.php";

class MemberModel extends Database
{

    public function getMembers(){
        $sql = "SELECT * FROM Members";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;

    }

    public function getSingleMember(){

    }

    public function getNewestMember(){


    }

    public function addMember($firstname, $lastname, $email, $phonenumber, $streetadress, $zipcode, $city, $paid, $interests){
        $sql = "INSERT INTO Members (firstname, lastname, email, phonenumber, streetadress, zipcode, city, paid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param("sssssssi", $firstname, $lastname, $email, $phonenumber, $streetadress, $zipcode, $city, $paid);
        $stmt->execute();
        $this->addMemberInterests($this->getConnection()->insert_id, $interests);
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function addMemberInterests($memberid, $interests){
        $sql = "INSERT INTO MembersInterests (memberid, interestid) VALUES (?, ?)";
        $this->getConnection()->begin_transaction();
        foreach ($interests as $interest) {
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bind_param('ss', $memberid, $interest);
            $stmt->execute();
            $stmt->close();
        }
        $this->getConnection()->commit();

    }

}
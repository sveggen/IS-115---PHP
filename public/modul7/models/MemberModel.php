<?php

require_once "Database.php";

class MemberModel extends Database
{

    /**
     * @return false|mysqli_result Retrieve MySQL-object containing
     * array of members.
     */
    public function getMembers()
    {
        $sql = "SELECT * FROM Members";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;

    }

    /**
     * Adds a new member to the DB.
     * @return false|mysqli_result Return either true or false depending
     * on success/failure.
     */
    public function addMember($firstname, $lastname, $email, $phonenumber, $streetadress, $zipcode, $city, $paid, $interests)
    {
        $sql = "INSERT INTO Members (firstname, lastname, email, phonenumber, streetadress, zipcode, city, paid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param("sssssssi", $firstname, $lastname, $email, $phonenumber, $streetadress, $zipcode, $city, $paid);
        $stmt->execute();
        $this->addMemberInterests($this->getConnection()->insert_id, $interests);
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    /**
     * Adds interests to a member.
     */
    public function addMemberInterests($memberid, $interests)
    {
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

    /**
     * @return false|mysqli_result Returns a MySQL-object with an array of
     * members and their interests.
     */
    public function getAllMemberInterests()
    {
        $sql = "SELECT * FROM MembersInterests JOIN Interests I 
    on MembersInterests.interestid = I.interestid
    JOIN Members M on MembersInterests.memberid = M.memberid
    ORDER BY I.name";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;

    }

}
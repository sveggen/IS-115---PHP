<?php

require_once "Database.php";
require_once "UserModel.php";
require_once "AddressModel.php";

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
     * @param $array array containing all member data
     * @return false|mysqli_result Return either true or false depending
     * on success/failure.
     */
    public function addMember($array)
    {
        $paid = 0;
        $addressModel = new AddressModel();
        $addressid = $addressModel->addAddress($array['streetaddress'], $array['zipcode']);
        $sql = "INSERT INTO Members (firstname, lastname, email, 
                     phonenumber, paid, addressid) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param("ssssii", $array['firstname'], $array['lastname'], $array['email'],
            $array['phonenumber'], $paid, $addressid);
        $stmt->execute();
        $memberId = $this->getConnection()->insert_id;
        if ($array['password']){
            $userModel = new UserModel();
            $userModel->registerUser($array['email'], $array['password'], $memberId);
        }
        $this->addMemberInterests($memberId, $array['interests']);
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
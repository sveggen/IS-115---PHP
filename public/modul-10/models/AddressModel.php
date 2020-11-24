<?php

require_once "Database.php";


class AddressModel extends Database
{


    /**
     * Returns true if zipcode is valid, false if not.
     */
    public function checkForValidZipCode($zipcode){
        $result = $this->getZipcode($zipcode)->fetch_assoc();
        if ($result['zipcode']){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Adds an address to the database.
     */
    public function addAddress($streetaddress, $zipcode)
    {
        $sql = "INSERT INTO Address (streetaddress, zipcode) VALUES (?, ?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param("ss", $streetaddress, $zipcode);
        $stmt->execute();
        $insertId = $this->getConnection()->insert_id;
        $stmt->close();
        return $insertId;
    }

    /**
     * Returns data from Zipcoderegister base on input as zipcode.
     */
    public function getZipcode($zipcode){
        $sql = "SELECT * FROM Zipcoderegister WHERE zipcode = ? LIMIT 1";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('s',$zipcode);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

}
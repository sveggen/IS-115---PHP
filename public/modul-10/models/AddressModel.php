<?php

require_once "Database.php";


class AddressModel extends Database
{


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

}
<?php

require_once "Database.php";

class InterestsModel extends Database
{

    /**
     * @return false|mysqli_result Returns a MySQL-object with an array
     * containing all the registered interests in the DB.
     */
    public function getAllInterests(){
        $sql = "SELECT * FROM Interests";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

}
<?php

require_once "Database.php";

class InterestsModel extends Database
{

    public function getAllInterests(){
        $sql = "SELECT * FROM Interests";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

}
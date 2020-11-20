<?php

require_once "Database.php";

class ActivitiesModel extends Database
{

    /**
     * @return false|mysqli_result Containing MySQL of array containing
     * all future activities.
     */
    public function getAllFutureActivities(){
        $sql = "SELECT * FROM Activities WHERE Activities.start >= CURTIME() ORDER BY Activities.start";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }




}
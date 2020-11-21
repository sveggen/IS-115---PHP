<?php
session_start();

require_once "models/UserModel.php";
include './include/header.inc.php';
$title = "User Information";

$userModel = new UserModel();
$array = $userModel->getSingleUser($_SESSION['username']);
?>

<div class="medlembakgrunn">
    <div class="medlemdata">
        <h1>User info</h1>
        <?php
        foreach ($array as $row) {
            echo "<p>Hi " . $row['username'] . "<br>Your usernumber is: "
                . $row['userid'] . "<br>Your membernumber is: " . $row['memberid'] . " </p>";
        }
        ?>
    </div>
</div>

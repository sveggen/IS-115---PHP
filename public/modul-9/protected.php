<?php
session_start();

require_once "models/UserModel.php";
include './include/header.inc.php';
$title = "User Information";

$userModel = new UserModel();
$array = $userModel->getSingleUser($_SESSION['username']);
$membernr = "";

include './include/upload.inc.php';
?>

<div class="medlembakgrunn">
    <div class="medlemdata">
        <h1>User info </h1>
        <?php
        foreach ($array as $row) {
            echo "<p>Hi " . $row['username'] . "<br>Your membernumber is: " . $row['memberid'] .
                " </p>";
            echo  '<img src="assets/images/' . $row['memberid'] . '.jpg" width="150" height="100" </img>';
            $membernr = $row['memberid'];
        }
        ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="path" size="20">
        </div>
        <div class="form-group">
            <input type="submit" name="submit">
        </div>
    </form>
    </div>
</div>

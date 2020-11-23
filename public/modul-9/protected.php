<?php
session_start();

require_once "models/UserModel.php";
$title = "User Information";
include './include/header.inc.php';

$userModel = new UserModel();
$array = $userModel->getSingleUser($_SESSION['username']);

$dir_path = "./assets/images/";
$prefix = array("jpg", "png", "jpeg");

// finds the users profile image OR
// returns the placeholder image
function find_profile_image() {
    global $prefix;
    global $dir_path;
    $existing_file = "";

    foreach ($prefix as $element) {
        $file = $dir_path . $_SESSION['memberid'] . "." . $element;
        if (file_exists($file)) {
            $existing_file =  $file;
        }
    }
    if ($existing_file){
        return $existing_file;
    } else{
        return $dir_path . "placeholder.png";
    }
}

include './include/upload.inc.php';
$msg = upload_image();
?>

<div class="medlembakgrunn">
    <div class="medlemdata">
        <h1>Profile </h1>
        <?php
        foreach ($array as $row) {
            echo "<p>Username: " . $row['username'] . "<br>Member-ID: " . $row['memberid'] .
                " </p>";
            echo '<img src="' . find_profile_image() . '"width="200" height="200" </img>';
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image"></label>
                <input type="file" class="form-control-file" id="customFile" name="path">
            </div>
            <div class="form-group">
                <button class="btn btn-primary " name="submit" type="submit">Add picture</button>
            </div>

            <?php
            if (is_array($msg)){
                echo implode(",", $msg);
            } else {
                echo $msg;
            }?>
        </form>
    </div>
</div>



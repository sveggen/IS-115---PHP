<?php

if ($_POST['submit'] && empty($_FILES['path']['name'])){
    die("<p> No file chosen </p>");
}

else {
    $temp_file = $_FILES['path']['tmp_name'];
    $new_file = "./assets/images/" . $_SESSION['memberid'] . ".jpg";
    if (move_uploaded_file($temp_file, $new_file)){
        echo "<p> Image was uploaded </p>";
    } else {
        echo "<p> Image failed to upload </p>";
    }
}
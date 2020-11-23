<?php

function upload_image(){
$dir_path = "./assets/images/";

$prefix = array("jpg", "png", "jpeg");
$msg = array();
define('MB', 1048576); //defines size of 1 megabyte
$extension = pathinfo($_FILES['path']['name'], PATHINFO_EXTENSION); // file extension

// checks if image is uploaded through a POST-request and if 'submit' is set.
if (isset($_POST['submit']) && is_uploaded_file($_FILES['path']['tmp_name']) == false){
    return $msg[] = "No file chosen";
}

elseif (isset($_POST['submit'])) {
    $temp_file = $_FILES['path']['tmp_name'];
    $new_file = $dir_path . $_FILES['path']['name'];

    // checks if file-extension matches accepted extensions.
    if (!in_array($extension, $prefix)) {
        $msg[] = "Invalid filetype";
    }

    // checks if filesize matches required size.
    if ($_FILES['path']['size'] > 2 * MB) {
        $msg[] = "Filesize exceeds limit";

        // uploads file if file passed all previous checks
    } elseif ($_FILES['path']['size'] < 2 * MB && in_array($extension, $prefix)) {
        if (move_uploaded_file($temp_file, $new_file)) {
            foreach ($prefix as $element) {
                $file = $dir_path . $_SESSION['memberid'] . "." . $element;
                if (file_exists($file)) {
                    unlink($file); // deletes existing profile image(s)
                }
            }
            // renames profile image to PK of member + extension
            rename($new_file, $dir_path . $_SESSION['memberid'] . "."
                . $extension);
            $msg[] = "Image was uploaded";
        } else {
            $msg[] = "Image failed to upload";
        }
    }
}
    return $msg;
}
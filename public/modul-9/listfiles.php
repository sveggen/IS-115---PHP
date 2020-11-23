<?php

include './include/header.inc.php';
$title = "List files";

$dir_path = './assets/images/';

// sets the timezone
date_default_timezone_set('CET');


//returns the permissions of a given file
function check_perms($file){
    $perms = "";

    if(file_exists($file)){
        if (is_readable($file)){
            $perms .= "Readable, ";
        }
        if (is_writable($file)){
            $perms .= "Writable, ";
        }
        if (is_executable($file)){
            $perms .= "Executable, ";
        }
    } else $perms .= "File does not exist";

    //removes trailing comma and whitespace
    return rtrim(trim($perms), ',');
}

$dir = opendir($dir_path);
?>
<div class="medlembakgrunn">
    <h1>Files in /images/</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Filename</th>
            <th scope="col">Type</th>
            <th scope="col">Extension</th>
            <th scope="col">Filesize</th>
            <th scope="col">Time of last change</th>
            <th scope="col">Permissions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            // loops through files until function
            // returns false when dir is empty
            while (false !== ($file = readdir($dir))){
            ?>
            <th scope="row">1</th>
            <td><?php echo $file ?></td>
            <td><?php echo filetype($dir_path . $file); ?></td>
            <td><?php echo pathinfo($dir_path . $file, PATHINFO_EXTENSION); // gets file extension ?></td>
            <td><?php echo filesize($dir_path . $file); // gets filesize in bytes?> bytes</td>
            <td><?php echo date("d.m.Y H:i",filemtime($dir_path . $file)); // gets date of last edit ?></td>
            <td><?php echo check_perms($dir_path . $file); ?></td>
        </tr>
        </tbody>
        <?php
        }
        closedir($dir);
        ?>
    </table>
</div>

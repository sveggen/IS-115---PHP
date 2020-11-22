<?php

include './include/header.inc.php';
$title = "List files";

$dir = './assets/images/';

$file1 = opendir($dir);
?>
<div class="medlembakgrunn">
    <h1>Files in /images/</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Filename</th>
            <th scope="col">Filetype</th>
            <th scope="col">Filesize</th>
            <th scope="col">Time of change</th>
            <th scope="col">Permissions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            while (false !== ($file = readdir($file1))){
            ?>
            <th scope="row">1</th>
            <td><?php echo "<a href='$dir . $file'>$file" ?></td>
            <td><?php echo filetype($dir . $file); ?></td>
            <td><?php echo filesize($dir . $file); ?></td>
            <td><?php echo filemtime($dir . $file); ?></td>
            <td><?php echo substr(sprintf("%o",fileperms($dir .$file)),-4); ?></td>
        </tr>
        </tbody>
        <?php
        }
        closedir($file1);
        ?>
    </table>
</div>

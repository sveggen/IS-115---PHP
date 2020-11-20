<!-- Oppgave 5 -->
<?php

include './include/header.inc.php';
$title = "Members interests";
require_once "models/MemberModel.php";

?> <h1>Members Interests</h1>
<?php
$model = new MemberModel();
$array = $model->getAllMemberInterests();


foreach ($array as $row) {

    ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Memberid</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col">Street Adress</th>
                <th scope="col">Zipcode</th>
                <th scope="col">City</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
    <tr>
        <td><?php echo $row['memberid']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phonenumber']; ?></td>
        <td><?php echo $row['streetadress']; ?></td>
        <td><?php echo $row['zipcode']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo $row['name']; ?></td>
    </tr>
        </table>
    <?php
}
?>
<!-- Oppgave 2 -->
<?php

include './include/header.inc.php';
$title = "Member list";

require_once "models/MemberModel.php";

?> <h1>Member list</h1>
<?php
$model = new MemberModel();
$array = $model->getMembers();

// converts tinyint to the string paid/not paid
function paymentStatusInWords($status){
    if ($status){
        return "Paid";
    } else {
        return "Not paid";
    }
}

$counter = 1;
foreach ($array as $row) {
    ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Memberid</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col">Street Adress</th>
                <th scope="col">Zipcode</th>
                <th scope="col">City</th>
                <th scope="col">Paid membership</th>
            </tr>
            </thead>
            <tbody>
    <tr>
        <th scope="row"><?php echo $counter++; ?></th>
        <td><?php echo $row['memberid']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phonenumber']; ?></td>
        <td><?php echo $row['streetadress']; ?></td>
        <td><?php echo $row['zipcode']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo paymentStatusInWords($row['paid']); ?></td>
    </tr>
        </table>
    <?php
}
?>
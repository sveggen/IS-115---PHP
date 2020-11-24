<?php
session_start();

require_once "models/UserModel.php";
include './include/header.inc.php';
$title = "User Information";

$userModel = new UserModel();

// returns User + Member + Address info from DB and displays info in table
$array = $userModel->getSingleUserComplete($_SESSION['username']);
?>

        <h1>Profile</h1>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">Street Address</th>
                <th scope="col">Zip code</th>
                <th scope="col">City</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                foreach ($array as $row) {
                ?>
                <th scope="row"><?php echo $row['memberid'] ?></th>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['lastname'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['streetaddress'] ?> </td>
                <td><?php echo $row['zipcode']; ?></td>
                <td><?php echo $row['city']?></td>
            </tr>
            </tbody>
    </table>
</div>
<?php
}?>
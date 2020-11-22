<?php

session_start();
require_once "models/UserModel.php";

if (isset($_POST['submit'])) {
    $userModel = new UserModel();

    //check if credentials are correct
    if ($userModel->login($_POST['email'], $_POST['password'])) {
        // set session variables
        $memberid = $userModel->getSingleUser($_POST['email'])->fetch_assoc();
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $_POST['email'];
        $_SESSION['memberid'] = $memberid['memberid'];
        header("Location:http://www.localhost:8081/modul-9/dashboard.php");
        exit();

    } else {
        include './include/login.inc.php';
    }
} else {
    include './include/login.inc.php';
}
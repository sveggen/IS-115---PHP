<?php

session_start();
require_once "models/UserModel.php";

if (isset($_POST['submit'])) {
    $userModel = new UserModel();

    //check if credentials are correct
    if ($userModel->login($_POST['email'], $_POST['password'])) {
        // returns member-credentials from DB
        $memberid = $userModel->getSingleUser($_POST['email'])->fetch_assoc();
        //set session variables
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $_POST['email'];
        $_SESSION['memberid'] = $memberid['memberid'];
        //redirects to dashboard-page
        header("Location:http://www.localhost:8081/modul-10/dashboard.php");
        exit();

    } else {
        include './include/login.inc.php';
    }
} else {
    include './include/login.inc.php';
}
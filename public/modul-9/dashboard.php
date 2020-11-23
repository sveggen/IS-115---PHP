<?php
session_start();
if (isset($_SESSION['loggedIn'])) {
    require_once 'protected.php';

} else {
    // redirects to error page
    header("Location:http://www.localhost:8081/modul-9/401.php");
    exit();
}

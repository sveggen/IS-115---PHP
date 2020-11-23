<?php
if (isset($_SESSION['loggedIn'])) {
    header("Location:http://www.localhost:8081/modul-10/dashboard.php");

} else {


include './include/header.inc.php';
$title = "Log in";

// )
?>

    <div class="registrer-medlem">
        <div class="bakgrunn">
            <form action="" method="post">
                <div class="form-group">
                    <h3>Log in</h3>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control" name="email" placeholder="email@email.com">
                </div>
                <div class="form-group ">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" name="password" placeholder="*******">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" name="submit" type="submit">Log in</button>
                    <?php if (!isset($_SESSION['username']) && isset($_POST['submit'])) {
                        ?><small class="form-text text-danger">Wrong username or password.</small>
                        <?php
                    } ?>
                </div>
            </form>
        </div>
    </div>

<?php

include './include/footer.inc.php';
}
?>
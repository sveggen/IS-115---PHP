<?php
require_once "models/UserModel.php";
require_once "models/MemberModel.php";
require_once "models/AddressModel.php";
require_once "models/InterestsModel.php";
include './include/fieldValidation.php';

$addressModel = new AddressModel();
// Adds a new member to the database if all the required fields have been entered,and the zip code is valid.
if (isset($_POST['submit']) && allFieldsValueCheck() == true &&
$addressModel->checkForValidZipCode($_POST['zipcode']) == true) {
    header("Location:http://www.localhost:8081/modul-10/login.php");

    $memberdata = $_POST;
    $memberModel = new MemberModel();
    $memberModel->addMember($memberdata);
    exit();

    // displays the page if a the submit button have not been clicked
    // OR some fields are missing values.
} else {

include './include/header.inc.php';
$title = "Add member";

?>

<div class="bakgrunn">

    <?php

    $member = array();

    // Populates fields from POST-array.
    function setValue($field)
    {
        $value = "";
        if (!empty($_POST[$field])) {
            $value = "value =" . $_POST[$field];
        }
        echo (string)$value;
    }

    ?>
    <div class="registrer-medlem">
        <form action="" method="post">
            <div class="form-group">
                <h3>Register a new member</h3>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="firstname">Firstname:
                    <input type="text" class="form-control" name="firstname" placeholder="Ola"
                        <?php echo (!empty($_POST['firstname'])) ? ('value = "' . $_POST["firstname"] . '"') : "value = \"\""; ?> />
                    <?php if (empty($_POST['firstname']) && isset($_POST['submit'])) { ?>
                        <small class="form-text text-danger">Firstname is missing.</small>
                    <?php } ?>
                    </label>
                </div>
                <div class="form-group ">
                    <label for="lastname">Lastname:
                    <input type="text" class="form-control" name="lastname" placeholder="Nordmann"
                        <?php echo (!empty($_POST['lastname'])) ? ('value = "' . $_POST["lastname"] . '"') : "value = \"\""; ?> />
                    <?php if (empty($_POST['lastname']) && isset($_POST['submit'])) {
                        ?>
                        <small class="form-text text-danger">Lastname is missing.</small>
                    <?php } ?>
                    </label>
                </div>
            </div>
            <div class="form-group ">
                <label for="email">Email:
                <input type="email" class="form-control" name="email"
                       placeholder="ola@mail.no" <?php setValue("email") ?> />
                <?php if (empty($_POST['email']) && isset($_POST['submit'])) { ?>
                    <small class="form-text text-danger">Email is missing or not valid.</small>
                <?php } ?>
                </label>
            </div>
            <div class="form-group">
                <label for="phonenumber">phonenumber:
                <input type="tel" class="form-control" name="phonenumber" pattern="[0-9]{8}"
                       placeholder="12345678" <?php setValue("phonenumber") ?> />
                <?php if (empty($_POST['phonenumber']) && isset($_POST['submit'])) { ?>
                    <small class="form-text text-danger">Phone number is missing or not valid.</small>
                <?php } ?>
                </label>
            </div>
            <div class="form-group">
                <label for="date">Birthdate:
                <input type="date" class="form-control" min="1900-01-01" max="2010-01-01"
                       name="date" <?php date("YYYY-MM-DD", strtotime(setValue("date"))) ?> placeholder/>
                <?php if (empty($_POST['date']) && isset($_POST['submit'])) { ?>
                    <small class="form-text text-danger">Birthdate is missing or not valid.</small>
                <?php } ?>
                </label>
            </div>
            <div class="form-group">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="male" name="gender" value="male" class="custom-control-input"
                        <?php if (!empty($_POST['gender']) && ($_POST['gender']) == "male") { ?> checked=true <?php } ?> />
                    <label class="custom-control-label" for="male">Male</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="female" name="gender" value="female" class="custom-control-input"
                        <?php if (!empty($_POST['gender']) && ($_POST['gender']) == "female") { ?> checked=true <?php } ?> />
                    <label class="custom-control-label" for="female">Female</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="other" name="gender" value="other" class="custom-control-input"
                        <?php if (!empty($_POST['gender']) && ($_POST['gender']) == "other") { ?> checked=true <?php } ?> />
                    <label class="custom-control-label" for="other">Other</label>
                </div>
                <?php if (empty($_POST['gender']) && isset($_POST['submit'])) { ?>
                    <small class="form-text text-danger">Select your gender</small>
                <?php } ?>
            </div>
            <div class="form-row">
                <div class="form-group ">
                    <label for="streetaddress">streetaddress: </label>
                    <input type="text" class="form-control" name="streetaddress" placeholder="Grindvegen 47"
                        <?php echo (!empty($_POST['streetaddress'])) ? ('value = "' . $_POST["streetaddress"] . '"') : "value = \"\""; ?> />
                    <?php if (empty($_POST['streetaddress']) && isset($_POST['submit'])) { ?>
                        <small class="form-text text-danger">Street address is missing or not valid.</small>
                    <?php } ?>
                </div>
                <div class="form-group ">
                    <label for="zipcode">zipcode: </label>
                    <input type="text" class="form-control" name="zipcode" pattern="[0-9]{4}"
                           placeholder="1431" <?php setValue("zipcode") ?> />
                    <?php if (empty($_POST['zipcode']) && isset($_POST['submit'])) { ?>
                        <small class="form-text text-danger">Zip code is missing</small>
                    <?php } elseif (isset($_POST['submit'])  // checks with DB if zip code is valid.
                        && $addressModel->checkForValidZipCode($_POST['zipcode']) == false) { ?>
                        <small class="form-text text-danger">Zip code is not valid</small>
                    <?php } ?>
                </div>
            </div>

                <div class="form-group ">
                <label for="checkboxes">Interests:</label>
                    <div class="checkboxes">
                        <?php

                        $interestModel = new InterestsModel();
                        $interests = $interestModel->getAllInterests();

                        //lists all interests from the Database.
                        foreach ($interests as $row) {
                            ?>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="interests[]" class="form-check-input"
                                       value="<?php echo $row['interestid'] ?>">
                                <label class="form-check-label" for="<?php echo $row['name'] ?>"><?php echo ucfirst($row['name']) ?></label>
                            </div>
                        <?php } ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Password:
                            <input type="password" class="form-control"
                                   name="password" placeholder="*******"/>
                        </label>
                    </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" name="submit" type="submit">Register</button>
            </div>

<?php
}

include './include/footer.inc.php'; ?>




<?php

function allFieldsValueCheck()
{
    if (!empty($_POST['firstname']) && !empty($_POST['lastname'])
        && !empty($_POST['email']) && !empty($_POST['phonenumber'])
        && !empty($_POST['date']) && !empty($_POST['streetaddress'])
        && !empty($_POST['zipcode'])
        && !empty($_POST['city']) ) {
        return true;
    }



}
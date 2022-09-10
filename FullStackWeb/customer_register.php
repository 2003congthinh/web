<?php
if (isset($_POST['signup'])) {
    
    $username= $_POST['username'];
    $password= $_POST['password'];
    $fullname= $_POST['fullname'];
    $address= $_POST['address'];

    $img_dir = "picts/";
    $img_file = $img_dir . basename($_FILES['file']['name']);

    require_once "functions3.php";


    if (usernameCheck($username) !== true) {
        header('location: customers_login.php?error=invalidUsername');
        exit();
    }

    if (usernameExists($username) !== true) {
        header('location: customers_login.php?error=usernameExisted');
        exit();
    }

    if (passwordCheck($password) !== true) {
        header('location: customers_login.php?error=invalidPassword');
        exit();
    }

    if (nameCheck($fullname) !== true) {
        header('location: customers_login.php?error=invalidName');
        exit();
    }

    if (addressCheck($address) !== true) {
        header('location: customers_login.php?error=invalidAddress');
        exit();
    }

    createAccount($username, $password, $fullname, $address, $img_file);

    $_SESSION['displayFullName']= $fullname;
    $_SESSION['displayAddress']= $address;

}
else {
    header('location: customers_login.php');
}
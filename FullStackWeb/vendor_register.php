<?php
if (isset($_POST['signup'])) {
    
    $username= $_POST['username'];
    $password= $_POST['password'];
    $businessname= $_POST['businessname'];
    $address= $_POST['address'];

    $img_dir = "picts/";
    $img_file = $img_dir . basename($_FILES['file']['name']);

    require_once "functions.php";


    if (usernameCheck($username) !== true) {
        header('location: vendors_login.php?error=invalidUsername');
        exit();
    }

    if (usernameExists($username) !== true) {
        header('location: vendors_login.php?error=usernameExisted');
        exit();
    }

    if (passwordCheck($password) !== true) {
        header('location: vendors_login.php?error=invalidPassword');
        exit();
    }

    if (businessnameCheck($businessname) !== true) {
        header('location: vendors_login.php?error=invalidBusinessName');
        exit();
    }

    if (businessnameExists($businessname,$username) !== true) {
        header('location: vendors_login.php?error=businessnameExisted');
        exit();
    }

    if (addressCheck($address) !== true) {
        header('location: vendors_login.php?error=invalidAddress');
        exit();
    }

    createAccount($username, $password, $businessname, $address, $img_file);

    $_SESSION['displayBusinessName']= $businessname;
    $_SESSION['displayAddress']= $address;

}
else {
    header('location: vendors_login.php');
}
<?php
if (isset($_POST['signup'])) {
    
    $username= $_POST['username'];
    $password= $_POST['password'];
    $img_dir = "picts/";
    $img_file = $img_dir . basename($_FILES['file']['name']);
    $hub= $_POST['hub'];

    require_once "functions2.php";


    if (usernameCheck($username) !== true) {
        header('location: shippers_login.php?error=invalidUsername');
        exit();
    }

    if (usernameExists($username) !== true) {
        header('location: shippers_login.php?error=usernameExisted');
        exit();
    }

    if (passwordCheck($password) !== true) {
        header('location: shippers_login.php?error=invalidPassword');
        exit();
    }

    createAccount($username, $password, $hub, $img_file);

    $_SESSION['displayHub']= $hub;

}
else {
    header('location: shippers_login.php');
}
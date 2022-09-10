<?php

session_start();

function usernameCheck($username) {
    $usernamePattern="/^[A-Za-z][^0-9]{7,15}$/"; 
    if (preg_match($usernamePattern, $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function usernameExists($username) {
    $searchfor='Username: ' . $username;
    $account = file_get_contents('accounts.txt');
    if (preg_match("/$searchfor/", $account)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}

function passwordCheck($password) {
    $passwordPattern='/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&*])(\S){8,16}$/';
    if (preg_match($passwordPattern, $password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function createAccount($username, $password, $hub, $img_file) {
    $location = $_FILES["file"]["tmp_name"];
    move_uploaded_file($location, $img_file); 
    file_put_contents('accounts.txt', 'Picture' . $username . ': ' . $img_file ."\n", LOCK_EX | FILE_APPEND);
    
    $passhash = password_hash($password, PASSWORD_DEFAULT);
    file_put_contents('accounts.txt', 'Username: ' . $username ."\n", LOCK_EX | FILE_APPEND);
    file_put_contents('accounts.txt', 'Password: ' . $passhash ."\n", LOCK_EX | FILE_APPEND);
    file_put_contents('accounts.txt', 'Hub' .  $username . ': '  . $hub ."\n", LOCK_EX | FILE_APPEND);
    header('location: shippers_login.php?error=created');
}

function emptySignin($username, $password) {
    if (empty($username) || empty($password)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}

function usernameLogin($username) {
    $searchfor='Username: ' . $username;
    $account = file_get_contents('accounts.txt');
    if (preg_match("/$searchfor/", $account)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passwordLogin($username, $password) {
    $file = file_get_contents('accounts.txt');
    $accountArray = explode("\n", $file);
    $account = implode(" ", $accountArray);
    $hashedPassword = array();
    $checkUser ="/(?<=Username: $username Password: )(.*?)(?= Hub)/";
    preg_match($checkUser, $account, $hashedPassword);
    if (password_verify($password, $hashedPassword[1])) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

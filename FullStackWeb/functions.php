<?php

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

function businessnameCheck($businessname) {
    $textPattern='/^[\s\S][\w\W][\d\D]{3,}$/';
    if (preg_match($textPattern, $businessname)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function businessnameExists($businessname,$username) {
    $searchfor='Business_name'.$username.': ' . $businessname;
    $account = file_get_contents('accounts.txt');
    if (preg_match("/$searchfor/", $account)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}

function addressCheck($address) {
    $textPattern='/^[\s\S][\w\W][\d\D]{3,}$/';
    if (preg_match($textPattern, $address)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function createAccount($username, $password, $businessname, $address, $img_file) {
    $location = $_FILES["file"]["tmp_name"];
    move_uploaded_file($location, $img_file); 
    file_put_contents('accounts.txt', 'Picture' . $username . ': ' . $img_file ."\n", LOCK_EX | FILE_APPEND);
    
    $passhash = password_hash($password, PASSWORD_DEFAULT);
    file_put_contents('accounts.txt', 'Username: ' . $username ."\n", LOCK_EX | FILE_APPEND);
    file_put_contents('accounts.txt', 'Password: ' . $passhash ."\n", LOCK_EX | FILE_APPEND);
    file_put_contents('accounts.txt', 'Business_name' .  $username . ': ' . $businessname ."\n", LOCK_EX | FILE_APPEND);
    file_put_contents('accounts.txt', 'Address' . $username . ': ' . $address ."\n", LOCK_EX | FILE_APPEND);
    header('location: vendors_login.php?error=created');
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
    $checkUser ="/(?<=Username: $username Password: )(.*?)(?= Business_name)/";
    preg_match($checkUser, $account, $hashedPassword);
    if (password_verify($password, $hashedPassword[1])) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function save_to_file() {
    $file_name = 'products.csv';
    $fp = fopen($file_name, 'a');
    $fields = ['name', 'price', 'describtion'];
    fputcsv($fp, $fields);
    if (is_array($_SESSION['products'])) {
      foreach ($_SESSION['products'] as $product) {
        fputcsv($fp, $product);
      }
    }
  }


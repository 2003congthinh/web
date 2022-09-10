<?php
session_start();
  if (isset($_POST['submit'])) {
    $product = [
      'name' => $_POST['name'],
      'price' => $_POST['price'],
      'describtion' => $_POST['describtion'],
      // 'file' => $_POST['file'],
    ];
    $_SESSION['products'][] = $product;

    $img_dir = "products/";
    $img_file = $img_dir . basename($_FILES['file']['name']);

    require_once "functions.php";
    save_to_file();
    header('location: add_product.php');
  }


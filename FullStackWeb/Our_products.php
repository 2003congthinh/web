<?php
function filter() {
    $file_name = 'products.csv';
    $open = fopen($file_name, 'r');
    $first = fgetcsv($open);
    $products = [];
    while ($row = fgetcsv($open)) {
        $i = 0;
        $product = [];
        foreach ($first as $col_name) {
            $product[$col_name] = $row[$i];
            $i++;
        }

        if (isset($_GET['min']) && is_numeric($_GET['min'])) {
            if ($product['price'] < $_GET['min']) {
                continue;
            }
        }

        if (isset($_GET['max']) && is_numeric($_GET['max'])) {
            if ($product['price'] > $_GET['max']) {
                continue;
            }
        }

        if (isset($_GET['name']) && !empty($_GET['name'])) {
            if (strpos($product['name'], $_GET['name']) === false) {
                continue;
            }
        }
        $products[] = $product;
        
    }
    return($products);
}

$products = filter();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="Our_products.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="offcanvas offcanvas-start" id="demo">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title">Menu</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <p><a href="Our_products.php" class="link-dark">See my product</a></p>
    <p><a href="add_product.php" class="link-dark">Add product</a></p>
    <p><a href="vendor_my_account.php" class="link-dark">My Account</a></p>
  </div>
</div>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/RMIT_University_Logo.svg/1280px-RMIT_University_Logo.svg.png" height="40px">
      </a>

      <div class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0"></div>

      <div class="col-md-5 text-end">
        <a href="logout.php">
          <button type="button" class="btn btn-outline-primary me-2">Logout</button></a>
        <!-- <button type="button" class="btn btn-primary">Sign-up</button> -->
        <button class="btn btn-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
          <img src="https://icons.veryicon.com/png/o/business/financial-linear-icon/option-3.png" height="30px">
        </button>
      </div>
    </header>
  </div>

<main>

  <div class="container-fluid mt-3 mb-3">
    <h1>Our Products</h1>

    <div class="d-flex justify-content-end">
    <form action="Our_products.php" method="get">
            <p>Min Price: </p><input type="number" name="min"><br>
            <p>Max Price: </p><input type="number" name="max"><br>
            <p>Product Name: </p> <input type="text" name="name"><br>
            <button type="submit" name="act" value="Filter">Submit</button>
        </form>
    </div>
    <div class="row gx-3 gy-3">
<?php

  foreach ($products as $product) {
    echo"      <div class='col-md-6 col-lg-4 justify-content-center'>
    <div class='h-100 pt-3 pb-3 border'>
      <div class='description'>
      <img class='products' src='https://static.wixstatic.com/media/43e7e4_819918a8af8b41b09c20c21937b284de~mv2.png/v1/fill/w_1000,h_921,al_c/43e7e4_819918a8af8b41b09c20c21937b284de~mv2.png'<br>
        <br>".$product["name"]."<br>".$product["describtion"]."<br>
        $".$product["price"]." <br>
          <button type='submit' class='btn btn-warning font-size-12'>Add to Cart</button>
        </div>
    </div>
  </div>";

  }
?>

    </div>
  </div>
</main>

<footer id="footer" class="bg-dark text-white py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-12">
        <h4 class="font-rubik font-size-20">Information</h4>
        <div class="d-flex flex-column flex-wrap">
          <a href="aboutus.html" class="font-rale font-size-14 text-white-50 pb-1">About Us</a>
          <a href="contact.html" class="font-rale font-size-14 text-white-50 pb-1">Contact us</a>
          <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Privacy Policy</a>
          <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Copyright</a>
        </div>
      </div>
    </div>
  </div>
</footer>

</body>
</html>

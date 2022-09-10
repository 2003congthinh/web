<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
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
      <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
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

<main id="main-area">
       <!-- registration area -->
       <section id="register">
        <div class="row m-0">
            <div class="col-8"> 
                <div class="text-center pb-5">
                    <h1 class="login-title text-dark">Add a product</h1>
                </div>
                <form action="add_functions.php" method="post" class="submit" enctype="multipart/form-data">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div id="reg-form">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" required name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
  
                        <div class="form-row my-4">
                            <div class="col">
                                <input type="text" required name="describtion" id="describtion" class="form-control" placeholder="Describtion">
                            </div>
                        </div>
  
                        <div class="form-row my-4">
                            <div class="col">
                                <input type="text" required name="price" id="price" class="form-control" placeholder="Price">
                            </div>
                        </div>
                        <div class="form-row my-4">
                            <div class="col">
                                <input type="file" required name="file" id="file" class="form-control-file" placeholder="Image">
                            </div>
                        </div>
                        <div class="submit-btn text-center my-5">
                            <button type="submit" name="submit" class="btn btn-warning rounded-pill text-dark px-5">Add</button>
                        </div>
                        </div>
                </div>
            </div>
                 </form>
            </div>
        </div>
    </section>
    <!-- #registration area -->
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="add.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Book store</title>
        <link rel = "stylesheet" href = "register_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body id="shippers">
      
      <header><a class = "a" href = choice.php>
         <i class="fa fa-arrow-circle-o-left"></i>
         <p>Back</p>
      </a></header>
      <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "invalidUsername") {
            echo "<p>Invalid Username</p>";
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "usernameExisted") {
            echo "<p>Username already exsits</p>";
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "invalidPassword") {
            echo "<p>Invalid Password</p>";
        }
    }

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "created") {
            echo '<p>Register succesfully, go to Login page to login!</p>';
        }
    }
?>
            <main class="shippers">
                <div class="wrapper">
                    <div class="title-text">
                       <div class="title login">
                          Login Form
                       </div>
                       <div class="title signup">
                          Signup Form
                       </div>
                    </div>
                    <div class="form-container">
                       <div class="slide-controls">
                          <input type="radio" name="slide" id="login" checked>
                          <input type="radio" name="slide" id="signup">
                          <label for="login" class="slide login">Login</label>
                          <label for="signup" class="slide signup">Signup</label>
                          <div class="slider-tab"></div>
                       </div>
                       <div class="form-inner">
                          <form action="shipper_validate.php" method="post" class="login">
                             <div class="field">
                                <input type="text" name="username" placeholder="Username" required>
                             </div>
                             <div class="field">
                                <input type="password" name="password" placeholder="Password" required>
                             </div>
                             <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit" name="signin" value="Login">
                             </div>
                          </form>
                          <form action="shipper_register.php" method="post" class="signup" enctype="multipart/form-data">
                           <div class="field">
                            <input type="text" name="username" placeholder="User name" required>
                           </div>
                           <div class="field">
                              <label for="hub">Choose your Distribution hub:</label>
                              <select name="hub">
                                 <option>XaDan</option>
                                 <option>KimLien</option>
                                 <option>BaTrieu</option>
                                 <option>DaiKim</option>
                               </select>
                           </div>
                           <div class="field">
                              <input type="password" name="password" placeholder="Password" required>
                           </div>
                           <div class="field">
                            <input type="file" name="file" required>
                           </div>
                             <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit" name="signup" value="Signup">
                             </div>
                          </form>
                       </div>
                    </div>
                 </div>
            </main>

            <footer>
                <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
                    <!-- Copyright -->
                    <div class="text-white mb-3 mb-md-0">
                      Copyright © 2020. All rights reserved.
                    </div>
                    <!-- Copyright -->
                  </div>
            </footer>
            <script src="login.js"></script>
    </body>
</html>
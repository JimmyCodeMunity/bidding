<?php
@include('config.php');
session_start();

error_reporting(1);

if(isset($_POST['admin_submit'])){
  $email = mysqli_escape_string($conn,$_POST['email']);
  $pass = md5($_POST['password']);

  
  $select = "SELECT * FROM admin WHERE email='$email' && password = '$pass'";
  $res = mysqli_query($conn,$select);

  if(mysqli_num_rows($res)>0){
    $row = mysqli_fetch_array($res);
    if($row['status'] == 1){
      $_SESSION['admin_name'] = $row['name'];
      $_SESSION['admin_email'] = $row['email'];
      header('location:admin/index.php');
      
    }
    else{
      $error[] = 'admin offlined';
    }
  }
  else{
    $error[] = 'incorrect email or password';
  }
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tangara|Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/fav.png" rel="icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>
  <header id="header" class="fixed-top bg-dark ">
    <div class="container d-flex align-items-center">

      <!--<h1 class="logo me-auto"><a href="index.html">Tangara</a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo me-auto"><img src="assets/img/favicon.png" alt="" class="img-fluid">Tangara</a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
          
          <li><a class="nav-link scrollto" href="index.html">Team</a></li>
          
          <li><a class="nav-link scrollto" href="index.html">Contact</a></li>
          <li><a class="getstarted scrollto" id="abt" href="login.html">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main>
    <div class="container">


      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4"> <a
              href="index.html" class="logo d-flex align-items-center
              w-auto">
              
               </a> </div><!-- End
              Logo -->

              <div class="card mb-3">

                <div class="card-body">


                  <div class="pt-4 pb-2">

                    <div class="card-title text-center pb-0 fs-4">

                      <div class="loglogo">
                <img
              src="assets/img/favicon.png" alt="logo">
              </div>
                    </div>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>

                  
                  <form class="row g-3 needs-validation" novalidate method="POST">
                    <div class="col-12">
                    <?php
                    if(isset($error)){
                      foreach($error as $error){
                        echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                        };
      };
      ?>                    
    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" required class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    
                    <div class="col-12">
                      <button class="btn btn-success w-100" type="submit" name="admin_submit">Admin Login</button>
                    </div>
                    
                    <div class="col-12">
                      <p class="small mb-0">Forgot Password</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by CodeMunity
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
<style type="text/css">
  .loglogo img{
    height: 100px;
    width: 100px;
    margin-top: -30px;
    
  }
  .container{
    margin-top: 20px;

  }
</style>

</html>
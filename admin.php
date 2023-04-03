<?php
@include('includes/config.php');
//@include('includes/userhead.php');
session_start();


error_reporting(1);

if(isset($_POST['admin_submit'])){
  $email = $_POST['email'];
  $pass = md5($_POST['password']);

  
  $select = "SELECT * FROM admin WHERE email='$email' && password = '$pass'";
  $res = mysqli_query($conn,$select);

  if(mysqli_num_rows($res)>0){
    $row = mysqli_fetch_array($res);
    if($row['status'] == 1){
      $_SESSION['admin_name'] = $row['name'];
      $_SESSION['admin_email'] = $row['email'];
      header('location:admindash/dashboard/index.php');
      
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
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BiddersOnline</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script type="text/javascript">
        function bid(id)
        {
            if(confirm('Sure Participate?'))
                {
                    alert('You Are Not Sign in, Please Sign In For Bid');
                    window.location='BidProduct.php?bid='+id
                    }
                }
</script>
    </head>
    
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-black">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">BiddersOnline</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="userpage.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="mybids.php">my Bids</a></li>
                        <li class="nav-item"><a class="nav-link" href="adpost.php">Post</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Car.php">Car</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="Computer.php">Computer</a></li>
                                <li><a class="dropdown-item" href="Mobile.php">Mobiles</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" action="Search.php" method="POST">
                        <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search" size="40">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                
                                
                            </ul>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        
        </section>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
  

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
                      <button class="btn btn-success w-100 bg-black" type="submit" name="admin_submit">Admin Login</button>
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
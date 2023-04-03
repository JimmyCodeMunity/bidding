<?php
@include('includes/config.php');
@include('includes/userhead.php');

error_reporting(1);



if(isset($_POST['submit'])){
  $username = mysqli_escape_string($conn,$_POST['uname']);
  $email = mysqli_escape_string($conn,$_POST['email']);
  $pass = md5($_POST['password']);
  $rpass = md5($_POST['rpassword']);
  


  $select = "SELECT * FROM admin WHERE email = '$email' && password ='$pass'";
  $res = mysqli_query($conn,$select);

  if(mysqli_num_rows($res)>0){
    $error[] = 'user alredy existing';
  }
  else{
    if($pass != $rpass){
      $error[] = 'passwords do not match';
    }
    else{
      $insert = "INSERT INTO admin(name,email,password)VALUES('$username','$email','$pass')";
      mysqli_query($conn,$insert);
      header('location:admin.php');
    }
  }
  
}
?>

<body>

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

              <h3 class="text-center">Admin Registration</h3>
              <div class="card mb-3">


                <div class="card-body">


                  <div class="pt-4 pb-2">

                    <div class="card-title text-center pb-0 fs-4">

                      
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
                      <label for="yourPassword" class="form-label">Username</label>
                      <input type="text" name="uname" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your username</div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" required class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>
                  

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="rpassword" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100 bg-black" type="submit" name="submit">Save</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"><a href="login.php">Back to Login</a></p>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"><a href="confirm.php">choose other</a></p>
                    </div>
                    
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">Fundis</a>
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
  
</style>

</html>
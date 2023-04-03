<?php
@include('includes/config.php');

error_reporting(1);



if(isset($_POST['submit'])){
  $username = mysqli_escape_string($conn,$_POST['uname']);
  $phone = $_POST['phone'];
  $email = mysqli_escape_string($conn,$_POST['email']);
  $pass = md5($_POST['password']);
  $rpass = md5($_POST['rpassword']);

  //image upload
  $path="images/".basename($image_name);
  
  $image_name = $_FILES["profile_pic"]["name"];
  
  $file_extension= pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
  
  $allowed_ext = array("png","jpg");
  
  if (!in_array($file_extension, $allowed_ext )){
    header("Location:updateuser.php");
    exit();
  }
  $profile_pic = rand() .$profile_pic.'.'.$file_extension;
  
  $profile_pic_tmp_name = $_FILES["profile_pic"]["tmp_name"];
  
  $target = $path . $profile_pic;
  
  move_uploaded_file($profile_pic_tmp_name, $target);
  


  $select = "SELECT * FROM userdata WHERE email = '$email' && password ='$pass'";
  $res = mysqli_query($conn,$select);

  if(mysqli_num_rows($res)>0){
    $error[] = 'user alredy existing';
  }
  else{
    if($pass != $rpass){
      $error[] = 'passwords do not match';
    }
    else{
      $insert = "INSERT INTO userdata(name,email,password,phone,profilepic)VALUES('$username','$email','$pass','$phone','$profile_pic')";
      mysqli_query($conn,$insert);
      header('location:login.php');
    }
  }
  
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Auctions</title>
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
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
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="register.php">Register</a></li>
                                
                            </ul>
                        </button>
                    </form>
                </div>
            </div>
        </nav>



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

                  
                  <form class="row g-3 needs-validation" action="" method="POST" enctype ="multipart/form-data">
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
                      <div class="invalid-feedback">Please enter your username!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Phone</label>
                      <input type="text" name="phone" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your phone</div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" required class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your email</div>
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
                      <label for="yourPassword" class="form-label">Picture</label>
                      <input type="file" name="profile_pic" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    
                    <div class="col-12">
                      <button class="btn btn-success bg-black w-100" type="submit" name="submit">Register</button>
                    </div>
                    
                    <div class="col-12">
                        <a  class="" href="login.php">Already have account?Login</a>
                      <p class="small mb-0">Forgot Password</a></p>
                    </div>
                  </form>

                </div>
              </div>
        
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

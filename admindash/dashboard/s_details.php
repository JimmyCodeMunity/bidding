

<?php
@include('config.php');
session_start();

error_reporting(1);

if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from userdata where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $username=$row['name'];
    
  }else{
    header('location:vendor_management.php');
    die();
  }
}
if(isset($_GET['type']) && $_GET['type']!=''){
  $type=$_GET['type'];
  if($type=='status'){
    $operation=$_GET['operation'];
    $id=$_GET['id'];
    if($operation=='active'){
      $status='1';
    }else{
      $status='0';
    }
    $update_status_sql="update userdata set status='$status' where id='$id'";
    mysqli_query($conn,$update_status_sql);
  }
  
  if($type=='delete'){
    $id=$_GET['id'];
    $delete_sql="delete from userdata where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}
if(isset($_POST['update'])){
  $username=$_POST['name'];
  $email = mysqli_escape_string($conn,$_POST['email']);
  $phone = $_POST['mobile'];
  

 

  $update_data = "UPDATE userdata SET name='$username',email='$email',mobile='$phone' WHERE id='$id'";
  mysqli_query($conn,$update_data);
  if(!$update_data){
    $error[] = '<div class="alert alert-danger" role="alert">
  error saving data
</div>';

  }
  else{
    $error[] = '<div class="alert alert-success" role="alert">
  new data saved successfully!
</div>';

  }

}
if(isset($_POST['passchange'])){
  $newpass = md5($_POST['newpass']);

  $passchange = "UPDATE userdata SET password='$newpass' WHERE id='$id'";
  mysqli_query($conn,$passchange);

  if(!$passchange){
    $error[] = '<div class="alert alert-danger" role="alert">
  error changing password
</div>';

  }
  else{
    $error[] = '<div class="alert alert-success" role="alert">
  password changed successfully
</div>';

  }
}
$sql="SELECT * FROM userdata WHERE name='$username'";
$res=mysqli_query($conn,$sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ApartmentFinder|Update
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">
          ApartmentFinder
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
     <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./index.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li>
            <a href="./map.php">
              <i class="nc-icon nc-pin-3"></i>
              <p>Apartments</p>
            </a>
          </li>
          
          <li>
            <a href="./user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Customers</p>
            </a>
          </li>
          <li>
            <a href="./menu.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Products</p>
            </a>
          </li>OnlineBids
          <li>
            <a href="./orders.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Categories</p>
            </a>
          </li>
          
          <li>
            <a href="../../logout.php">
              <i class="nc-icon nc-button-power"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Tech Gladiators</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="../../images/safar.jpg" alt="...">
                    <h5 class="title"><?php echo $row['name']?></h5>
                  </a>
                  <p class="description">
                    @codeingcircle
                  </p>
                </div>
                <p class="description text-center">
                  "I like the way you work it <br>
                  No diggity <br>
                  I wanna model up"
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5>12<br><small>Files</small></h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>2GB<br><small>Used</small></h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5>24,6$<br><small>Spent</small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Team Members</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        Ronald@techgladiator.co.ke
                        <br />
                        <span class="text-muted"><small>Offline</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        warren@techgladiator.co.ke
                        <br />
                        <span class="text-success"><small>Available</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-ms-7 col-7">
                        Virginia@techgladiator.co.ke
                        <br />
                        <span class="text-danger"><small>Busy</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <?php
          if (isset($error)) {
            foreach ($error as $error) {
              echo '<span class="login100-form-title">'.$error.'</span>';
              // code...
            };
            // code...
          };

          ?>
                <form action="" method="POST">
                  <div class="row">

                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="ApartmentFinder">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="name" class="form-control"  placeholder="Username" value="<?php echo $row['name'];?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row['email'];?>">
                      </div>
                    </div>
                  </div>
                
                    
                  
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="mobile" placeholder="Country" value="<?php echo $row['mobile'];?>">
                      </div>
                    </div>
                   

                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="update">Update Profile</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          
<!--password changer-->
      <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">change password</h5>
              </div>
              <div class="card-body">
                <form action="" method="POST">
                  <div class="row">
                    
                    <div class="col-md-5 pr-1">
                      <?php
          if (isset($error)) {
            foreach ($error as $error) {
              echo '<span class="login100-form-title">'.$error.'</span>';
              // code...
            };
            // code...
          };

          ?>
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="ApartmentFinder">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>old Password</label>
                        <input type="password" name="pass" class="form-control"  placeholder="Username" value="<?php echo $row['password'];?>">
                      </div>
                    </div>
                      <br>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" class="form-control" name="newpass" placeholder="" value="">
                      </div>
                    </div>
                  </div>
                
                    
                  
                    
                   
                   
                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="passchange">Update Password</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="#" target="_blank">J-Plymouth</a></li>
                <li><a href="#/blog" target="_blank">Blog</a></li>
                <li><a href="#/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by J-Plymouth
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>
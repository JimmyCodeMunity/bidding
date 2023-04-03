

<?php
@include('config.php');
session_start();
$collect = "SELECT * FROM apartments ORDER BY id desc limit 1";
$result = mysqli_query($conn,$collect);


error_reporting(1);

if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from apartments where id='$id'");
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
    $update_status_sql="update apartments set status='$status' where id='$id'";
    mysqli_query($conn,$update_status_sql);
  }
  
  if($type=='delete'){
    $id=$_GET['id'];
    $delete_sql="delete from apartments where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}
if(isset($_POST['update'])){
  $s_name = mysqli_real_escape_string($conn,$_POST['aptname']);
  $s_price = $_POST['price'];
  $loc = $_POST['location'];
  $gar = $_POST['garages'];
  $types = $_POST['types'];
  $bth = $_POST['bathrooms'];
  

 

  $update_data = "UPDATE apartments SET apartment_name='$s_name',apartment_price='$s_price',apartment_location='$loc',garages='$gar',apartment_type='$types' WHERE id='$id'";
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

$sql="SELECT * FROM apartments WHERE apartment_name='$s_name'";
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
              <p>Menu</p>
            </a>
          </li>
          <li>
            <a href="./orders.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Orders</p>
            </a>
          </li>
           <li>
            <a href="./notice.php">
              <i class="nc-icon nc-chat-33"></i>
              <p>Notice</p>
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
      
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Apartment Details</h5>
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
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="ApartmentFinder.">
                      </div>
                    </div>
                  </div>
                    <div class="col-md-3 px-1">
                      <div></div>
                      <div class="form-group">
                        <label>Photo</label>
                        <img style="border:1px solid black;" src="images/<?=$row['apartment_photo'] ?>"width="800px" height="300" >
                      </div>
                    </div>
                  </div>
                    
                
                    
                  
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="aptname" placeholder="Country" value="<?php echo $row['apartment_name'];?>">
                      </div>
                    </div>
                     <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Country" value="<?php echo $row['apartment_location'];?>">
                      </div>
                    </div>
                     <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Country" value="<?php echo $row['apartment_price'];?>">
                      </div>
                    </div>
                     <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="types" placeholder="Country" value="<?php echo $row['apartment_type'];?>">
                      </div>
                    </div>
                     <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>No of garages</label>
                        <input type="text" class="form-control" name="garages" placeholder="Country" value="<?php echo $row['garages'];?>">
                      </div>
                    </div>
                  </div>
                   

                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="update">Update details</button>
                    </div>
                  </div>
                </form>
              </div>
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
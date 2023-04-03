<?php
@include('includes/usehead.php');
@include 'includes/config.php';
session_start();

if(!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
  header('location:login.php');
  exit();
}

error_reporting(1);

if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from product where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $serv=$row['username'];
    
    
  }else{
    header('serv.php');
    die();
  }
}
$servselect = "SELECT * product";
$product = array();

$Price = $row['price'];
$price1 = $Price+100;
$price2 = $Price+300;
$price3 = $Price+500;


if(isset($_POST['bid'])){
  $buyer = $_POST['buyer'];
  $bidprice = $_POST['bidprice'];
  $id = $_GET['id'];

  $select = "SELECT * FROM product WHERE id = '$id'";
  $result = mysqli_query($conn,$select);
  $row = mysqli_fetch_array($result);
  $user = $row['username'];
  $bidder = $_SESSION['user_name'];
  
  $datenow = date("Y-m-d");
  $enddate = $row['enddate'];

  if($bidder == $user){
    $error[] = 'you cant bid your own product';
  }else{
    if($datenow >= $enddate){
      $error[] = 'bid already expired';
    }
    else{
      $query="UPDATE product SET price='$bidprice',buyer='$buyer' WHERE id='$id'";
  mysqli_query($conn,$query);
  header('Location:userpage.php');

    }
    
  }
}






/*if(isset($_POST['submit'])){

   $uname = mysqli_real_escape_string($conn, $_POST['uname']);
   
   $date = mysqli_real_escape_string($conn, $_POST['date']);
   $uemail = $_POST['uemail'];
   $uloc = $_POST['ulocation'];
   $femail = $_POST['fundiemail'];
   $fname = $_POST['fundiname'];
   $service = $_POST['service_name'];
   $price = $_POST['payment'];
   


   $select = " SELECT * FROM product WHERE service = '$service' && bookdate = '$date'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'you already booked!';
      
     

   }else{
    $insert = "INSERT INTO product(username,bookdate,useremail,userlocation,fundiemail,fundiname,service,price) VALUES('$uname','$date','$uemail','$uloc','$femail','$fname','$service','$price')";
         mysqli_query($conn, $insert);
         header('location:viewproduct.php');
    
   }

};*/


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="navbar-top-fixed.css" rel="stylesheet">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="modal modal-signin position-static d-block bg-white-+ py-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Place Your Bid</h2>
        <a href="userpage.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="" action="" method="post">
          <?php
                    if(isset($error)){
                      foreach($error as $error){
                        echo '<div class="alert alert-danger text-center" role="alert">'.$error.'</div>';
                        };
      };
      ?>
      <br>
      <div class="form-floating mb-3">
            <input type="text" required name="buyer" value="<?php echo $_SESSION['user_name'] ?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact">
            
            <label for="floatingInput">Bidder's Name</label>
          </div>
         
          <div class="form-floating mb-3">
            <input type="text" disabled name="service_name" value="<?php echo $row['productname'] ?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact">
            
            <label for="floatingInput">Product Name</label>
          </div>

          

          
          <div class="form-floating mb-3">
            <input type="text" disabled name="fundiemail" value="<?php echo $Price?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact">
            
            <label for="floatingInput">Current Price</label>
          </div>

          <div class="form-floating mb-3">
          <select name="bidprice" class="form-control rounded-3" id="floatingInput" required>
            <option for = "price" value="">---select your price---</option>
            <?php
            $Price = $row['price'];
            $price1 = $Price+100;
            

            $options = array("$price1","$price2","$price3");
            foreach($options as $option){
              if($option == $price1){
                echo "<option value='$option' selected>$option</option>";
              }
              else{
                echo "<option value='$option'>$option</option>";
              }
            }

            ?>
            
          </select>
                       
            
            <label for="floatingInput">Start Bid</label>
          </div>
          
            
          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" name="bid" type="submit">Place Bid</button>

          
          
          
        </form>
      </div>
    </div>
  </div>
</div>





</body>
<style type="text/css">
  body{
    background: url(images/mac.jpg);
    background-position: center;
    background-repeat: none;
    background-size: cover;
  }
</style>
</html>
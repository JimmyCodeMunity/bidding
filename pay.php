<?php
@include('includes/userheader.php');
@include 'includes/config.php';
session_start();





error_reporting(1);

if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $select = "SELECT * FROM product WHERE id='$id'";
  $res=mysqli_query($conn,$select);
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    /*$fname=$row['foodname'];
    $fprice = $row['price'];*/
    
  }else{
    header('serv.php');
    die();
  }
}
if(isset($_GET['buyer']) && $_GET['buyer']!=''){
  $image_required='';
  $cust=$_GET['buyer'];
  $res=mysqli_query($conn,"select * from product where buyer='$cust'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $fname=$row['foodname'];
    $fprice = $row['price'];
    
  }else{
    header('serv.php');
    die();
  }
}
$user = $_SESSION['user_name'];
$query = "SELECT * FROM product WHERE buyer = '$user'";
$query_run = mysqli_query($conn,$query);

$qty= 0;
while ($num = mysqli_fetch_assoc ($query_run)) {
    $qty += $num['price'];
}






if(isset($_POST['pay'])){

   
   $tprice = $_POST['total'];
   


   $select = " SELECT * FROM product";

   $result = mysqli_query($conn, $select);

   if(!$result){

      $error[] = 'Booking failed!';
      
     

   }else{
   $update_data = "UPDATE product SET sellprice='$tprice',pay_status = 1 WHERE id='$id' ";
  mysqli_query($conn,$update_data);
  if(!$update_data){
    $error[] = '<div class="alert alert-danger" role="alert">
  error saving data
</div>';

  }
  else{
    header('location:myorder.php');

  }
}

};


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CompletePayment</title>
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
        <h2 class="fw-bold mb-0">Complete Payment</h2>
        <a href="myorder.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
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
            <input type="text" required name="buyer" value="<?php echo $_SESSION['user_name'] ?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact" readonly>
            
            <label for="floatingInput">Bidder's Name</label>
          </div>
         
          <div class="form-floating mb-3">
            <input type="text" name="service_name" value="<?php echo $row['productname'] ?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact" readonly>
            
            <label for="floatingInput">Product Name</label>
          </div>

          

          
          <div class="form-floating mb-3">
            <input type="text" name="total" value="<?php echo $row['price']?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact" readonly>
            
            <label for="floatingInput">Current Price</label>
          </div>

          
          
            
          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" name="pay" type="submit">Pay</button>

          
          
          
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
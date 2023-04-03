<?php
@include('includes/config.php');
session_start();
@include('includes/userhead.php');

//get id
if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from product where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $username=$row['username'];
    
  }else{
    header('location:vendor_management.php');
    die();
  }
}
if(isset($_GET['type']) && $_GET['type']!=''){
  $type=$_GET['type'];
  if($type=='sold'){
    $operation=$_GET['operation'];
    $id=$_GET['id'];
    if($operation=='active'){
      $sold='1';
    }else{
      $sold='0';
    }
    $update_sold_sql="UPDATE product SET sold='$sold' WHERE id='$id'";
    mysqli_query($conn,$update_sold_sql);
  }
  
  if($type=='delete'){
    $id=$_GET['id'];
    $delete_sql="delete from fundis where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Welcome <?php echo $_SESSION['user_name']?></h1>
                    <p class="lead fw-normal text-white-50 mb-0">Get it easy and done.</p>
                    <br>
                    <a class="btn btn-primary btn-lg" href="adpost.php">Post</a>
                </div>
            </div>
        </header>
        <h3 class="text-center">Availabale</h3>
        <!-- Section-->
        <div class="row pt-5" id="cards" style="padding:25px">

<?php
                        
        
        $query_command = "SELECT * FROM product WHERE sold = '1' ";

      $query_res = $conn->query($query_command);
          if ($query_res->num_rows > 0){  
            $a=0;          
              while($row = $query_res->fetch_assoc()){
                $sdate = $row['startdate'];
                $pid=$row['id'];
            $a++;
            
            ?>


	<div class="card text-center">
		
		
			<div class="card-image">
				<img src="productimages/<?=$row['productimage']; ?>" alt="dp" class="img-a img-fluid" style="" width='100px' height='100px'>
			</div>
      <div class="namer card-title"><?php echo $row['productname'];?></div>
      <div>Current Price:<strong> $<?php echo $row['price']?></strong></div>
      <div><strong>status:Running</strong></div>
			
		
		<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <?php echo "<a class='btn btn-small btn-primary' href='bid.php?id=".$row['id']."'>Bid</a>&nbsp;";?>
                                    </div>
                            </div>
  </div>
	
	<?php
        }
      }

        ?>
</div>
        </section>
        <h3 class="text-center">Sold</h3>
        <div class="row pt-5" id="cards" style="padding:25px">

<?php
                        
        
        $query_command = "SELECT * FROM product WHERE sold = '0' ";

      $query_res = $conn->query($query_command);
          if ($query_res->num_rows > 0){  
            $a=0;          
              while($row = $query_res->fetch_assoc()){
                $sdate = $row['startdate'];
                $pid=$row['id'];
            $a++;
            
            ?>


  <div class="card text-center">
    
    
      <div class="card-image">
        <img src="productimages/<?=$row['productimage']; ?>" alt="dp" class="img-a img-fluid" style="" width='100px' height='100px'>
      </div>
      <div class="namer card-title"><?php echo $row['productname'];?></div>
      <div><strong>Sold @ $<?php echo $row['price']?></strong></div>
      
    
    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                
                            </div>
  </div>
  
  <?php
        }
      }

        ?>
</div>
        <section>
          
        </section>
    </body>
    <style type="text/css">
    	.card{
  	max-height: 350px;
  	width: 200px;
    border: 1px solid #f9f9f9;
    box-shadow: 6px 8px 12px lightgrey;
    margin: 10px;
    background-color: #f5f5f5;
    padding: 15px;
  	color: black;
    font-family: sans-serif;

  }
  .card img{
    border-radius: 6px;
    width: 100%;
    height: 100%;
  }
  .card-image{
    height: 150px;
  }
    </style>
    </html>

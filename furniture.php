<?php
@include('includes/userhead.php');
$query = "SELECT * FROM product WHERE sold = '1' ";

     $result=mysqli_query($conn,$query);

    while ($row=mysqli_fetch_array($result))
    {
        $datenow = date("Y-m-d");
        
        $duedate = $row['enddate'];
            
        $prodid = $row['id'];
        if($datenow >= $duedate){


           $buyer=$row['buyer'];


            if($buyer=="Null")
            {
                $seller=$row['username'];
                 $ProductName=$row['productname'];

                 $message="Sorry Mr.".$seller.", Your Product ".$ProductName." Remain Unsold  No one bid your product";
                 $query1="insert into notification values('$seller','$message','No')";
                  mysqli_query($conn,$query1);

            }
            else
            {

            $qry="UPDATE product SET sold = 0 WHERE id = '$prodid'";
            mysqli_query($conn,$qry);

            $seller=$row['name'];
            $buyer=$row['buyer'];
            $ProductName=$row['productname'];

            $qry1="select * from userdata where name='$seller'";
            $result1=mysqli_query($conn,$qry1);
            $row1=mysqli_fetch_array($result1);
            $sname=$row1['name'];
            $semail=$row1['email'];
            $sphone=$row1['phone'];

            $qry2="select * from userdata where name='$buyer'";
            $result2=mysqli_query($conn,$qry2);
            $row2=mysqli_fetch_array($result2);
            $bname=$row2['name'];
            $bemail=$row2['email'];
            $bphone=$row2['phone'];
            
            $message="Congratulation Mr.".$sname.", Your Product ".$ProductName." has been sold and Buyer is ".$bname." You can contact with Buyer by Email:".$bemail." or You can use phone:".$bphone.".";
            $query1="insert into notification values('$seller','$message','0')";
            mysqli_query($conn,$query1);

            $message="Congratulation Mr.".$bname.", Your are the final and highest bidder of  Product ".$ProductName.". Now This is Your Product. Product Seller is ".$sname.", You can contact with Seller by Email:".$semail." or You can use phone: ".$sphone.".";
            $query2="insert into notification values('$buyer','$message','0')";
            mysqli_query($conn,$query2);
           }



        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Bids</title>
</head>
<body class="text-center">
    <div class="container">
        <section>

<div class="row pt-5" id="cards" style="padding:25px">

<?php
                        
        
        $select = "SELECT * FROM product";
        $query = mysqli_query($conn,$select);
        $row = mysqli_fetch_array($query);

        $cat = $row['category'];
        $query_command = "SELECT * FROM product WHERE sold = '1' && category = 'Furniture' ";

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
      <div><strong> $<?php echo $row['price']?></strong></div>
            
        
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <?php echo "<a class='btn btn-small btn-primary' href='bid.php?id=".$row['id']."'>Bid</a>&nbsp;";?>
                                    </div>
                            </div>
  </div>
    
    <?php
        }
      }
      else{
         echo '<div class="alert alert-danger" role="alert">No Funiture to display</div>';
      }

        ?>
</div>
        </section>
        <h3 class="text-center">Sold</h3>
        <section>

<div class="row pt-5" id="cards" style="padding:25px">

<?php
                        
        
        $select = "SELECT * FROM product";
        $query = mysqli_query($conn,$select);
        $row = mysqli_fetch_array($query);

        $cat = $row['category'];
        $query_command = "SELECT * FROM product WHERE sold = '0' && category = 'Furniture' ";

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
      <div><strong> $<?php echo $row['price']?></strong></div>
            
        
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                
                            </div>
  </div>
    
    <?php
        }
      }
      else{
         echo '<div class="alert alert-danger" role="alert">No furniture sold yet</div>';
      }

        ?>
</div>
        </section>
    </div>
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
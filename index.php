<?php
@include('includes/config.php');
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
        <?php
if (isset($_GET['message'])) {
    print '<script type="text/javascript">alert("' . $_GET['message'] . '");</script>';
}

if (isset($_GET['loginmessage'])) {
    print '<script type="text/javascript">alert("' . $_GET['loginmessage'] . '");</script>';
}
?>


        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop & Bid in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Get it easy and done.</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <h3 class="text-center">Running</h3>
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

        ?>
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
    <style type="text/css">
        .card{
    max-height: 400px;
    width: 200px;
    border: 1px solid #f9f9f9;
    box-shadow: 6px 8px 12px lightgrey;
    margin-bottom: 20px;
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
  .row{
    justify-content: space-evenly;

  }
    </style>
</html>

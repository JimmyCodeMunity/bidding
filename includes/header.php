<?php
@include('config.php');
session_start();
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
</html>

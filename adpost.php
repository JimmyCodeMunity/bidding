<?php
@include('includes/userhead.php');
error_reporting(1);

if(isset($_POST['submit'])){
  $pdname = $_POST['pname'];
  $pdprice = $_POST['price'];
  $category = $_POST['category'];
  $qnty = $_POST['quantity'];
  $desc = $_POST['details'];
  $sdate = date("Y-m-d");
  $edate = $_POST['enddate'];
  $buyer = $_SESSION['user_name'];
  $user = $_SESSION['user_name'];

  //image upload
  $path="productimages/".basename($image_name);
  
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
  


  $select = "SELECT * FROM product";
  $res = mysqli_query($conn,$select);

  $insert = "INSERT INTO product(username,productname,price,quantity,description,category,productimage,startdate,enddate)VALUES('$user','$pdname','$pdprice','$qnty','$desc','$category','$profile_pic','$sdate','$edate')";
      mysqli_query($conn,$insert);
      header('location:userpage.php');
    
  
  
}
?>
<section>
<div class="formcontainer" style="margin-top:100px;>
          <div class="row justify-content-center">
            <div class="col-lg-11 col-md-6 d-flex flex-column align-items-center justify-content-center">


      <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Add your Item</h5>
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
                <form action="" method="POST" enctype ="multipart/form-data">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" maxlength="30" name="pname" class="form-control" placeholder="Lexus" value="">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" name = "price" class="form-control" placeholder="$USD" value="">
                      </div>
                    </div>

                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name = "quantity" class="form-control" placeholder="1" value="">
                      </div>
                    </div>

                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Product Pic</label>
                        <input type="file" name = "profile_pic" class="form-control" placeholder="" value="">
                      </div>
                    </div>


                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Product Category</label>
                        <select name="category" class="form-control rounded-3" id="floatingInput" required>
                          <option for = "category" value="">---choose category---</option>
                          <?php
                          $servsel = "SELECT * FROM category";
                          $sel = mysqli_query($conn,$servsel);
                          while($row = $sel->fetch_assoc()){
                            $cn++;
                            ?>
                            <option for="service"><?php echo $row['categoryname']?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>

                    <!--<div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" name = "startdate" class="form-control" placeholder="1" value="">
                      </div>
                    </div>-->

                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>End Date</label>
                        <input type="date" name = "enddate" class="form-control" placeholder="1" value="">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="mb-3">
                      	<label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                      	<textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </div>

                    
                    
                   
                  
                  <div class="row" style="margin-top:13px;">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name = "submit">Complete</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
    
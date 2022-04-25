<?php
session_start();
include 'connect.php';
// session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $building_name = $_POST['building_name'];
    $type = $_POST['type'];
    $address = $_POST['address'];
    $pin_code = $_POST['pin_code'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;
    // $email = $_POST['email'];
 
    $insert_query = mysqli_query($conn, "INSERT INTO `listedproperty`(image, building, type, address, pin_code, price, userid,datetime) VALUES('$image', '$building_name' , '$type','$address', '$pin_code', '$price','{$_SESSION['userid']}',current_timestamp())") or die('query failed');
 
    if($insert_query){
       move_uploaded_file($image_tmp_name, $image_folder);
       $message[] = 'product add succesfully';
    //    echo "succ";
    header("location:index.php");
    }else{
       $message[] = 'could not add the product';
       echo "ducc";
    }
 }
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `listedproperty` WHERE image = '$remove_id'");
    header('location:addproperty.php');
 };
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Property</title>

    <style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }
    body {
        background-color: rgba(0, 0, 0, 0.5);
    }

    h2 {
        color: #19b51f;
        text-transform: uppercase;
        margin: auto;
        /* width: 100px; */
        text-align: center;
    }

    .add_propert {
        width: 100%;
        height: 100vh;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    .box {
        background-color: white;
        width: 350px;
        height: 650px;
        border-radius: 20px;
        padding: 20px 10px;
        /* margin: 10px 10px; */
    }

    .form-item {
        margin: 10px 10px;
    }

    .lbold {
        font-size: 15px;
        font-weight: bold;
        display: flex;
    }

    input[type=text], input[type=password], input[type=tel], input[type=email] 
    {
        padding: 8px 25px;
        /* margin: 0px 0px; */
        display: inline-block;
        border: 2px solid rgba(0, 0, 0, 0.3);
        border-radius: 10px;
    }

    .b-foot:hover{
        opacity: 0.7;
    }
    .add_propert_form{
        display: block;
        position: absolute;
        margin: 0px 35px;
    }
    .form-foot{
        margin: 10px 25px;
        border-radius: 10px;
        /* border: 2px solid yellowgreen; */
        
    }

    .b-foot{
        display: inline-block;
        color: rgba(0, 0, 0);
        margin: 5px 10px;
        padding: 5px 10px;
        text-decoration: none;
        border: none;
        background-color: #19b51f;
        cursor: pointer;
        /* border: 2px solid black; */
        border-radius: 10px;
        box-shadow: 8px 8px 10px rgba(0, 0, 0, 0.3);
        font-size: 20px;
    }
    .sign-check{
        font-size: 25px;
    }
    .sign-check a{
        text-decoration: none;

    }
</style>
</head>
<body>
<?php
include 'header.php';
?>
    <!-- <h1><?php echo $_SESSION['email']?></h1> -->
    <table class="table table-success table-striped">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Location</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      $select_cart = mysqli_query($conn, "SELECT * FROM `listedproperty` WHERE userid = '{$_SESSION['userid']}'") or  die ("Query failed");
      $num= 0;
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $num++;   
      ?>
    <tr>
      <!-- <fornm action="" method="POST"> -->
      <th scope="row"><?php echo $num ?></th>
      <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
      <td><?php echo $fetch_cart['address']; ?></td>
      <td><?php echo $fetch_cart['price']; ?></td>
      <!-- <td>
      <fornm action="cart.php" method="POST">
       <input type="hidden" name="image" value="<?php echo $fetch_cart['cartid']; ?>">
         <input type="submit" name="remove" value="Delete" >   
      </form>
      </td> -->
      <td><a href="addproperty.php?remove=<?php echo $fetch_cart['image']; ?>" onclick="return confirm('remove item from cart?')" class="nav-link"> <i class="fas fa-trash"></i> remove</a></td>
    </tr>
    <?php
         };
      };
      ?>
  </tbody>
</table>



    <div class="add_propert">
        <div class="box">
            <h2>ADD PROPERTY</h2>
            <form action="addproperty.php" method="POST" enctype="multipart/form-data" class="add_propert_form">
                <!-- <div class="form-item">
                    <div class="lbold">
                        <label for="image">Image</label>
                    </div>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="file" id="image" name="image" placeholder="Upload image" >
                </div> -->
                <div class="form-item">
                    <div class="lbold">
                        <label for="buildint_name">Building name</label>
                    </div>
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <input type="text" id="building_name"  name="building_name" placeholder="Enter building name" require>
                </div>
                <div class="form-item">
                    <div class="lbold">
                        <label for="type">Room type</label>
                    </div>
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <input type="text" id="type"  name="type" placeholder="Enter home type eg: 1BHK,2BHK" require>
                </div>
                <div class="form-item">
                    <div class="lbold">
                        <label for="address">Address</label>
                    </div>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <input type="text" id="address"  name="address" placeholder="address" require>
                </div>
                <div class="form-item">
                    <div class="lbold">
                        <label for="pin_code">Pin code</label>
                    </div>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <input type="text" id="pin_code" name="pin_code" placeholder="Enter pincode" require>
                </div>
                <div class="form-item">
                    <div class="lbold">
                        <label for="price">Price</label>
                    </div>
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="text" id="psw" name="price" placeholder="Enter price" require>
                </div>
                <div class="form-item">
                    <div class="lbold">
                        <label for="image">Image</label>
                    </div>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="file" id="image" name="image" placeholder="Upload image" require>
                </div>
                <!-- <div class="form-item">
                    <div class="lbold">
                        <label for="cpsw">Confirm Password</label>
                    </div>
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" id="cpsw" name="cpassword" placeholder="Confirm password" >
                </div> -->
                <hr>
                <div class="form-foot">
                    <a href="index.html" class="b-foot">HOME</a>
                    <button id="btn_add" class="b-foot">ADD</button>
                </div>
                <!-- <div class="sign-check">
                    <p>Do you have account? <a href="#">login</a></p>
                </div> -->
            </form>
        </div>
    </div>
    <div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
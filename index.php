
<?php

// if(isset($_SESSION['loggedin']))
include 'connect.php';

session_start();
if(isset($_POST['addToCart'])){
    $prop_image = $_POST['image'];
    $prop_address = $_POST['address'];
    $prop_price = $_POST['price'];
    $select_cart = mysqli_query($conn, "SELECT * FROM `propcart` WHERE image = '$prop_image' AND userid = '{$_SESSION['userid']}'" ) or die ("Query failed");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product =  mysqli_query($conn, "INSERT INTO `propcart` (image, address, price, userid) VALUES ('$prop_image', '$prop_address', '$prop_price', '{$_SESSION['userid']}')")or die ("Query failed");
      $message[] = 'product added to cart succesfully';
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <title>Real Estate</title>
</head>

<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};
include 'header.php';

?>
    <!-- <h1><?php echo "Welcome ". $_SESSION['userid']?>!</h1> -->
    <!-- <h1><?php echo "Welcome ". $_SESSION['email']?>!</h1> -->
    <!--                INDEX.HTML                -->
    <!-- header Part  -->
    
    <!-- Image Section With Text Content -->
    <section class="top">
        <div class="textContainer">
            <div class="text">
                <h2>REAL ESTATE</h2>
                <p>Know why buying property has become a top choice for investors and home buyer alike.</p>
                <a href="addproperty.php" class="nav-link"  >ADD PROPERTY</a>
            </div>
        </div>
        <div class="imgcontainer">
            <div class="img">
                <img src="img/logo1.png" class="" alt="Somethiong Wrong">
            </div>
        </div>
    </section>
    <div class="middle_heading">
        <h1 style="text-align: center;">LISTED PROPERTY HERE</h1>
        <!-- <a href="addproperty.php" class="nav-link"  >ADD PROPERTY</a> -->
    </div>



    <!--                MAIN CONTENT HTML                 -->
    <!-- <section id="mid-boxmain"> -->
        <!-- <div class="ser-top">
            <div class="left">
                <h2 class="mid-h2">SERVICE</h2>
            </div>
            <div class="mid-right"> -->
                <!-- <h2 class="mid-h2">SERVICE</h2> -->
                <!-- <div class="ser-btn" onclick="myFunction()">BUY</div>
                <div class="ser-btn" onclick="mysell()">SELL</div> -->
                <!-- <p class="btn">Color</p> -->
            <!-- </div>
        </div> -->
    <section class="main-box" id="toggle-buy">

            <!-- 1 content  -->
            <!-- <div class="box"> -->
            <?php

$select_products = mysqli_query($conn, "SELECT * FROM `listedproperty`");
if(mysqli_num_rows($select_products) > 0){
while($fetch_product = mysqli_fetch_assoc($select_products)){
?>
        <!-- <div class="cont_display"> -->
            <div class="box">
                <div class="img-box">
                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="Image">
                </div>
                <!-- detail box -->
                <div class="detail">
                    <!-- <Div class="btn-layer">
                        <a href="#" class="buy-btn">Buy Now</a>
                    </Div> -->
                    <!-- address  -->
                    <div class="type">
                        <h2><?php echo $fetch_product['building']; ?></h2>
                        <span class="font"><?php echo $fetch_product['address']; ?></span>
                        <span class="font"><?php echo $fetch_product['pin_code']; ?></span>
                    </div>
                    <!-- <a href="#" class="price"><?php echo $fetch_product['price']; ?></a> -->
                    <div>
                    <p class="font"><?php echo $fetch_product['type']; ?>BHK</p>
                    <p class="font">&#8377;<?php echo $fetch_product['price']; ?> Cr</p>
                    </div>
                    <div class="btns">
                    <!-- <input type="submit" class="btn" name="view" value="View details"> -->
                    <!-- <input type="submit" class="btn" name="addToCart" value="Add"> -->
                    <form action="" method="POST">
                    <input type="hidden" name="image" value="<?php echo $fetch_product['image'];
                     ?>">
                     <input type="hidden" name="address" value="<?php echo $fetch_product['address']; ?>">
                     <input type="hidden" name="h_type" value="<?php echo $fetch_product['type']; ?>Cr">
                     <input type="hidden" name="price" value="<?php echo $fetch_product['price']; ?>Cr">
                     <!-- <input type="submit" class="btn" name="addToCart" value="Add"> -->
                    </div>
                </div>
                <input type="submit" name="viewdetails" value="View detail">
                <input type="submit" name="addToCart" value="Add to cart">
                </form>
            </div>
            <?php
                };
            };
            ?>

        </section>
    <!-- </section> -->


    <!--                FOOTER HTML                 -->
    <form onsubmit="sendEmail; reset(); ">
        <h2 class="foot-h2">get in touch</h2>
        <div class="footer">
            <div class="left">
                <div class="left-item">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your Name">
                </div>
                <div class="left-item">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your Email">
                </div>
                <div class="left-item">
                    <label for="pnum">Phone:</label>
                    <input type="tel" id="pnum" name="pnum" placeholder="Enter your Phone Number">
                </div>

            </div>
            <div class="right">
                <textarea name="text-area" id="text-area" cols="59" rows="14"
                    placeholder="Enter your query here"></textarea>
            </div>
        </div>
        <button type="submit" class="button" id="btn">Submit</button>
    </form>
    <script src="script.js"></script>
</body>

</html>
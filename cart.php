<?php
    include 'connect.php';
    session_start();
    if(isset($_POST['remove'])){
      $cartid = $_POST['cartid'];
      $sql = mysqli_query($conn, "DELETE FROM propcart WHERE `propcart`.`cartid` = '$cartid' AND '{$_SESSION['userid']}'") or die ("query failed");
      header('location:index.php');
   };

   if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `propcart` WHERE image = '$remove_id'");
    header('location:cart.php');
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
    <title>Real Estate-cart</title>
</head>
<body>
<?php
include 'header.php';
?>
<section class="shopping-cart">
  <!-- <h1><?php echo $_SESSION['userid'];?></h1> -->

<!-- <h1 class="heading">shopping cart</h1> -->
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
      $select_cart = mysqli_query($conn, "SELECT * FROM `propcart` WHERE userid = '{$_SESSION['userid']}'") or  die ("Query failed");
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
      <td><a href="cart.php?remove=<?php echo $fetch_cart['image']; ?>" onclick="return confirm('remove item from cart?')" class="nav-link"> <i class="fas fa-trash"></i> remove</a></td>
    </tr>
    <?php
         };
      };
      ?>
  </tbody>
</table>


    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
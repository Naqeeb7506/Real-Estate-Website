<?php
// include 'connect.php';
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'connect.php';
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = " SELECT * FROM users where email= '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num= mysqli_num_rows($result);
    $fetch = mysqli_fetch_assoc($result);
    if($num>0){
        echo "succ";
        $login = true;
        // $fetch = myaqli_fetch_assoc($result);
        session_start();
        // $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['userid'] = $fetch['userid'];
        $_SESSION['loggedin'] = true;
        header("location:index.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log In</title>
    <script src="https://kit.fontawesome.com/8dad847539.js" crossorigin="anonymous"></script>
</head>
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
        width: 100px;
        align-items: center;
    }

    .login {
        width: 100%;
        height: 100vh;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    .box {
        background-color: white;
        width: 320px;
        height: 340px;
        border-radius: 10px;
        padding: 20px 20px;
        margin: 10px 10px;
    }

    .form-item {
        margin: 10px 10px;
    }

    .form-foot{
        margin: 10px 30px;
        border-radius: 10px;
        /* border: 2px solid yellowgreen; */
        
    }

    .lbold {
        font-size: 15px;
        font-weight: bold;
        display: flex;
    }

    input[type=email], input[type=password] {
        padding: 8px 25px;
        margin: 7px 0px;
        display: inline-block;
        border: 2px solid rgba(0, 0, 0, 0.3);
        border-radius: 10px;
    }

    .b-foot:hover{
        opacity: 0.7;
    }
    .log-form{
        display: block;
        position: absolute;
        margin: 0px 5px;
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
    hr{
        width: 100%;
    }
</style>
<body>
<?php 
include 'header.php';
?>

    <div class="login">
        <div class="box">
            <h2>Log in</h2>
            <form action="login.php" method="POST" class="log-form">
                <div class="form-item">

                    <div class="lbold">
                        <label for="email">Email</label>
                    </div>

                    <i class="fa fa-1x fa-envelope" aria-hidden="true"></i>
                    <input type="email" id="email" name="email" placeholder="Enter mail" required>
                </div>
                <div class="form-item">
                    <div class="lbold">
                        <label for="psw">Password</label>
                    </div>
                    <i class="fas fa-1x fa-key"></i>
                    <input type="password" id="psw" name="password" placeholder="Enter password" required>
                </div>
                <hr>
                <div class="form-foot">
                    <a href="/index.html" class="b-foot">HOME</a>
                    <button id="btn" class="b-foot">LOGIN</button>
                </div>
                <div class="sign-check">
                    <p>Dont't have account? <a href="signup.php">signup</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
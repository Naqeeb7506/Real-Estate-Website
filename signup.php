<?php
    // include 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'connect.php';
    $name = $_POST["name"];
    $mobileno = $_POST["mobileno"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
        if($password == $cpassword){
            $sql = "INSERT INTO `users` (`name`, `mobno`, `email`, `password`, `datetime`) VALUES ('$name', '$mobileno', '$email', '$password', current_timestamp());";
            $result= mysqli_query($conn, $sql);
            if($result){
                // echo "succ";
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['userid'] = $fetch['userid'];
                header ("location:index.php");
            }else{
                echo "err";
            }
        }else{
            echo "Pssword do not match";
        }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8dad847539.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
        <!-- CSS  -->
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

    .signup {
        width: 100%;
        height: 100vh;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    .box {
        background-color: white;
        width: 355px;
        height: 500px;
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
    .signup-form{
        display: block;
        position: absolute;
        margin: 0px 30px;
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
    <div class="signup">
        <div class="box">
            <h2>Sign Up</h2>
            <form action="signup.php" method="POST" class="signup-form">
                <div class="form-item">
                    <div class="lbold">
                        <label for="fname">Name</label>
                    </div>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" id="name" name="name" placeholder="Enter full name" required>
                </div>
                <div class="form-item">
                    <div class="lbold">
                        <label for="pNo">Mobile number</label>
                    </div>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <input type="tel" id="mobileno" min="1" max="10" name="mobileno" placeholder="Enter Mobile number" required>
                </div>
                <div class="form-item">
                    <div class="lbold">
                        <label for="email">Email</label>
                    </div>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <input type="email" id="email" name="email" placeholder="Enter mail" required>
                </div>
                <div class="form-item">
                    <div class="lbold">
                        <label for="psw">Password</label>
                    </div>
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" id="psw" name="password" placeholder="Enter password" required>
                </div>
                <div class="form-item">
                    <div class="lbold">
                        <label for="cpsw">Confirm Password</label>
                    </div>
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" id="cpsw" name="cpassword" placeholder="Confirm password" required>
                </div>
                <hr>
                <div class="form-foot">
                    <a href="index.html" class="b-foot">HOME</a>
                    <button id="btn-signin" class="b-foot">SIGNIN</button>
                </div>
                <div class="sign-check">
                    <p>Do you have account? <a href="#">login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
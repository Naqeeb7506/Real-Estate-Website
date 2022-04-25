<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>Contact Us</title>
    <style>
      h1 {
        font-size: 35px;
        font-family: "Times New Roman", Times, serif;
        color: rgb(0, 38, 255);
        margin: 2%;
      }
      p {
        margin: 2%;
      }
      .box{
        margin: 2%;
        border: 2px solid black;
        width: 40%;
      }
    </style>
  </head>
  <body>
<?php  include 'header.php'; ?>
    <img src="img/contact.jpg" alt="contact us" style="border-radius: 40px; width: 35%">
    
    <b><h2 style="margin: 2%;">You reach us by</h2></b>
    <p >Get in touch with us through Email,Phone or Give us your Query</p>

    <div class="box">
      <img src="img/call.png" alt="call" style="width: 50px;">
      <p>Call us at</p>
      <p>+91-7506157604</p>
    </div>

    <div class="box">
      <img src="img/email.png" alt="email" style="width: 50px;">
      <p>For Sales/Services/General Queries Mail us at</p>
      <a href="gmailto:realestateservice247@gmail.com">realestateservice247@gmail.com</a>
      
    </div>

    <div class="box">
      <img src="img/question.jpg" alt="question" style="width: 50px;">
      <p>Request for information</p>
      <p>Ask us for more information about our services</p>
      <p><a href="query.html">Send us your query</a></p>
    </div>
  </body>
</html>

<?php
$showAlert = false;
$showError = false;
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/dbConnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $existsQuery = "SELECT * FROM users WHERE username = '$username'";
    $existResult = mysqli_query($conn, $existsQuery);
    $rows = mysqli_num_rows($existResult);

    if ($password == $cpassword && $rows < 1) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$hashedPassword', current_timestamp())";
        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            $showAlert = true;
        }
    } else {
        if ($rows == 1) {
            $showError = true;
            $message = "Username Already Exists";
        } else {
            $showError = true;
            $message = "Enter Valid Credentials";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Authentication System</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <style>
      *{
        margin:0;
        padding:0;
        box-sizing:border-box;
      }
      .my-heading{
        text-align:center;
      }
      img{
        height:92%;
        width:100%;
        position:absolute;
        z-index:-2;
        opacity: 0.8;
      }
      label{
        font-weight:bold;
      }
      .my-button{
        display:flex;
        justify-content:center;
      }
      .my-button button{
        width:10vw;
      }
   </style>
  </head>
  
  <body>
    <?php
require 'partials/navbar.php'

?>
    <img src="banner.webp" alt="photo"/>
    <div class="container mt-4">
      <?php 
      if($showAlert){
        echo '<div class="alert  alert-success  alert-dismissible fade show" role="alert">
        <strong>Success ! </strong> Your account created successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      } 
      if($showError){
        echo '<div class="alert  alert-danger  alert-dismissible fade show" role="alert">
        <strong>Error ! </strong>'. $message . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      } 
      
      ?>
      <h1 class="my-heading">Register Your Account Here</h1>
      <form method="POST" action="register.php">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input
            type="text"
            name="username"
            class="form-control"
            id="username"
            aria-describedby="emailHelp"
          />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            name="password"
            class="form-control"
            id="password"
          />
          <div id="emailHelp" class="form-text">Check Your Password Twice</div>
        </div>
        <div class="mb-3">
          <label for="cpassword" class="form-label">Confirm Password</label>
          <input
            type="password"
            name="cpassword"
            class="form-control"
            id="cpassword"
          />
          <div id="emailHelp" class="form-text">Check Your Password Twice</div>
        </div>
        <div class="my-button">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
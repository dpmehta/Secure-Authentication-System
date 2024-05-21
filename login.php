<?php
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/dbConnect.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']); 

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $existResult = mysqli_query($conn, $sql);

    if ($existResult) {
        $row = mysqli_fetch_assoc($existResult); 
        if ($row && password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            header('location: welcome.php');
            exit();
        } else {
            $showError = true;
        }
    } else {
        $showError = true;
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
      if($showError){
        echo '<div class="alert  alert-danger  alert-dismissible fade show" role="alert">
        <strong>Error ! </strong> Login With correct credentials <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      } 
      
      ?>
      <h1 class="my-heading">Login To Your Account</h1>
      <form method="POST" action="login.php">
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
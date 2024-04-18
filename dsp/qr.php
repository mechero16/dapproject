<?php

session_start();

if (!isset($_SESSION['regno'])) {
    header("Location: index.php");
    exit();
}

$regno = $_SESSION['regno'];

$cmd="python qr.py " . $regno;
// Call the Python script with the regno variable as an argument
exec($cmd);
// Path to the image file

$path = "qr/".$regno.".png";




    ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR-Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg " style="background-color:#180024;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#" style="color:white">AutoAttend</a>
    
  </div>
</nav>

<div class="col-md-12" style="width: 50% ;margin:auto">

    <?php 
    echo "<img src='$path' alt='Image'>";
    ?>

    <div class="col-md-12" style="width: 90% ;margin:auto;text-align:center"> 
<h1><?php 
echo "Register number : " . $regno;
session_destroy(); ?></h1>

</div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
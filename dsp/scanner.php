<?php
        require_once('scan.php')
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR-Code scaner</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body style=" background-color: rgba(219,209,206,1)" >


<div class="card col-md-7 mx-auto " style="margin-top:9vw;" >
  <div class="card-header">
    Autoattend
  </div>
  <div class="card-body">
    <h5 class="card-title"> Thank you for using us</h5>
    <p class="card-text">Click the  d on your keyboard to terminate scanning</p>
    <a href="#" class="btn btn-primary" onclick="document.location='teacher.php'">Home</a>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
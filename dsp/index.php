<?php 
require_once("login.php");
   

session_start();

if (isset($_SESSION['regno'])) {
    if ($row["password"] == $password && $row["regno"] == $regno) {
       
        if($row['account']=='Student Account'){



            header("location:student.php");
        }else if ($row['account']=='Educator Account'){

            header("location:teacher.php");
        }
    }
    
} else if (isset($_POST['regno'])) {
    $regno = $_POST['regno'];
    $_SESSION['regno'] = $regno;
    if ($row["password"] == $password && $row["regno"] == $regno) {
       
        if($row['account']=='Student Account'){



            header("location:student.php");
        }else if ($row['account']=='Educator Account'){

            header("location:teacher.php");
        }
    }

}




?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .error {
            color: red;
        }

        .registration-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body style=" background-color: rgba(219,209,206,1)">



    <div class="registration-container">


        <form action="<?php echo htmlspecialchars($_SERVER["login.php"]); ?>" method="post">



            <h1 class="text-center">Login</h1>

            <div class="form-label col-md-7" style="width: 90%; margin: auto">
                <label for="regno">Registration Number</label>
                <input type="text" class="form-control text-center" style="border:2px solid black"
                    placeholder="Registration Number" name="regno" value="<?php echo $regno; ?>">
                <span class="error">*
                    <?php echo $regno_err; ?>
                </span>
            </div>
            <div class="form-lable col-md-7" style="width: 90%; margin: auto">
                <label for="Password">Password</label>
                <input type="text" class="form-control text-center" style="border:2px solid black"
                    placeholder="Password" name="Password" value=<?php echo $password; ?>>
                <span class="error">*
                    <?php echo $password_err; ?>
                </span>
            </div>

            <div class="col-md-12" style="margin:auto;width:90%">
                <button type="submit" class="btn btn-primary col-md-12">Sign in</button>

                <div class="col-md-7" style="height:max-content ">Don't have an account? <a class="col-md-12" href="register.php">Sign up</a></div>
                <div class="col-md-7" style="height:max-content"><a class="col-md-12" href="">Forgot Password?</a></div>
            </div>
            


        </form>



    </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
<?php 
require_once("config.php");
   
$regno = $name ="" ;

$regno_err = $name_err = " ";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (empty($_POST["regno"])) {
        $regno_err = "Registration Number is required";
    } else {
        $regno = test_input($_POST["regno"]);
    }
    if (empty($_POST["name"])) {
        $name_err = 'name is required';
    } else {
        $name = test_input($_POST["name"]);
    }

    $sql = "SELECT * FROM `userinfo` WHERE regno = ? ;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "sql failed";
    } else {
        mysqli_stmt_bind_param($stmt, 's', $regno);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        
    

    }

   
    if ($row["name"] != $name) {

        $name_err = "Invalid name ";

    }
    if ($row["regno"] != $regno) {

        $regno_err = "Invalid Registration Number";

    }
    
    $sql = "INSERT INTO `students`(`name`, `regno`) VALUES (?,?);";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "sql failed";
            } else {
                mysqli_stmt_bind_param($stmt, 'ss', $name,  $regno);
                mysqli_stmt_execute($stmt);
                header("location:teacher.php");


            }


    
    

    } 


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AddStudent</title>
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


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">



            <h1 class="text-center">Add Student</h1>

            <div class="form-label col-md-7" style="width: 90%; margin: auto">
                <label for="regno">Registration Number</label>
                <input type="text" class="form-control text-center" style="border:2px solid black"
                    placeholder="Registration Number" name="regno" value="<?php echo $regno; ?>">
                <span class="error">*
                    <?php echo $regno_err; ?>
                </span>
            </div>
            <div class="form-lable col-md-7" style="width: 90%; margin: auto">
                <label for="name">Student name</label>
                <input type="text" class="form-control text-center" style="border:2px solid black"
                    placeholder="name Of the Student" name="name" value=<?php echo $name; ?>>
                <span class="error">*
                    <?php echo $name_err; ?>
                </span>
            </div>

            <div class="col-md-12" style="margin:auto;width:90%">
                <button type="submit" class="btn btn-primary col-md-12">Add + </button>

                
            </div>
            


        </form>



    </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
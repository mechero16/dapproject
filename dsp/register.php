<?php
require_once("config.php");

error_reporting(0);

$password = "";
$name = $phno = $regno = $branch = $email = $account = "";

$password_err = $name_err = $phno_err = $branch_err = $regno_err = $email_err = $account_err = " ";



if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if (empty($_POST["password"])) {
        $password_err = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }
    if (empty($_POST["name"])) {
        $name_err = "name is required";
    } else {
        $name = test_input($_POST["name"]);
    }
    if (empty($_POST["phno"])) {
        $phno_err = "phone number is required";
    } else {
        $phno = test_input($_POST["phno"]);
    }
    if (empty($_POST["regno"])) {
        $regno_err = "Registration Number is required";
    } else {
        $regno = test_input($_POST["regno"]);
    }
    if (empty($_POST["branch"])) {
        $branch_err = "Branch is required";
    } else {
        $branch = test_input($_POST["branch"]);
    }
    if (empty($_POST["email"])) {
        $email_err = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }
    if (empty($_POST["account"])) {
        $account_err = "Account is required";
    } else {
        $account = test_input($_POST["account"]);
    }

    //get data from userinfo

    $sql = "SELECT * FROM `userinfo` ;";

    $result = mysqli_query($conn, $sql);
    $rc = mysqli_num_rows($result);

    if ($rc > 0) {
        $c = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['regno'] == $regno) {
                $regno_err = "Register number already in use";
                $c = true;
                break;
            }
        }

        if (!$c) {
            

            $sql = "INSERT INTO `userinfo`(`name`, `phno`, `regno`, `branch`, `email`, `password`, `account`) VALUES (?,?,?,?,?,?,?);";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "sql failed";
            } else {
                mysqli_stmt_bind_param($stmt, 'sssssss', $name, $phno, $regno, $branch, $email, $password, $account);
                mysqli_stmt_execute($stmt);
                header("location:index.php");


            }
        }
    }






}
;

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
;


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Here</title>
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




    <div class="container registration-container">
        <h2 class="text-center mb-4">Registration Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group" style=" margin:2%">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                <span class="error">*
                    <?php echo $name_err; ?>
                </span>
            </div>

            <div class="form-group" style=" margin:3%">
                <label for="phno">Phone Number</label>
                <input type="tel" class="form-control" id="phno" name="phno" value="<?php echo $phno; ?>">
                <span class="error">*
                    <?php echo $phno_err; ?>
                </span>
            </div>

            <div class="form-group" style=" margin:3%">
                <label for="regno">Registration Number</label>
                <input type="text" class="form-control" id="regno" name="regno" value="<?php echo $regno; ?>">
                <span class="error">*
                    <?php echo $regno_err; ?>
                </span>
            </div>

            <div class="form-group" style=" margin:3%">
                <label for="branch">Branch</label>
                <select class="form-control" id="branch" name="branch">
                    <option disabled>Select Branch</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                </select>
                <span class="error">*
                    <?php echo $branch_err; ?>
                </span>
            </div>

            <div class="form-group" style=" margin:3%">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                <span class="error">*
                    <?php echo $email_err; ?>
                </span>
            </div>



            <div class="form-group" style=" margin:3%">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    value="<?php echo $password; ?>">
                <span class="error">*
                    <?php echo $password_err; ?>
                </span>
            </div>

            <div class="form-group" style=" margin:3%">
                <label for="account">Account</label>
                <select class="form-control" id="account" name="account" value="<?php echo $account; ?>">
                    <option disabled>Select the account type </option>
                    <option value="Student Account">Student Account</option>
                    <option value="Educator Account">Educator Account</option>
                </select>
                <span class="error">*
                    <?php echo $account_err; ?>
                </span>
            </div>

            <div class="col-md-12" style="margin:auto;width:90%">
                <button type="submit" class="btn btn-primary col-md-12 btn-block">Register</button>
            </div>
        </form>
    </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
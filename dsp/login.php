<?php
require_once("config.php");

error_reporting(0);

$regno ; $password ;

$regno_err = $password_err = " ";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (empty($_POST["regno"])) {
        $regno_err = "Registration Number is required";
    } else {
        $regno = test_input($_POST["regno"]);
    }
    if (empty($_POST["Password"])) {
        $password_err = 'Password is required';
    } else {
        $password = test_input($_POST["Password"]);
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

   
    if ($row["password"] != $password) {

        $password_err = "Invalid Password ";

    }
    if ($row["regno"] != $regno) {

        $regno_err = "Invalid Registration Number";

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

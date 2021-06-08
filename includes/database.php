<?php
session_start(); 

$connection = mysqli_connect("localhost","root","","");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
   

    if($password === $cpassword)
    {
        $query = "INSERT INTO  (username,email,password) VALUES ('$username','$password')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            //echo "Saved";
            $_SESSION['success'] = "Admin Profile connect";
            header('Location: adduser.php');
        }
        else
        {
            echo "Not Saved";
            $_SESSION['status'] = "Admin Profile NOT connect";
            header('Location: adduser.php');
        }
    }
    else
    {
    $_SESSION['status'] = "Password and Confirm Password Does Not Match";
    header('Location: adduser.php');
    }
}



?>

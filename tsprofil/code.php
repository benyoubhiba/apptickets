<?php
session_start(); 

$connection = mysqli_connect("localhost","root","","appticket");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword)
    {
        $query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            //echo "Saved";
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: adduser.php');
        }
        else
        {
            echo "Not Saved";
            $_SESSION['status'] = "Admin Profile NOT Added";
            header('Location: adduser.php');
        }
    }
    else
    {
    $_SESSION['status'] = "Password and Confirm Password Does Not Match";
    header('Location: adduser.php');
    }
if ((!empty($username)) && (!empty($email)) && (!empty($password)) && (!empty($cpassword))){
    header('Location: adduser.php');
}else{
    $errorMessage = 'veulez remplir tous les champs';
}



}



?>

<div class="limiter">
 
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" >
			<img class="animate__animated animate__swing"src="images/undraw_laravel_and_vue_59tp.svg" alt="">
		</div>

				<form class="login100-form validate-form">
					<span  class="login100-form-title">
					 Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text"name="email" id="LoginUsername" placeholder="Email">
						<span class="focus-input100"></span>
						
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password"  name="Password"id="LoginPassword" placeholder="Password">
						<span class="focus-input100"></span>
					
					</div>
					
					<div  class="container-login100-form-btn">
					<button  type="submit" class="login100-form-btn"> 
					Login
					</button>		
					</div>
					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
					<a href="singin.php">Sign up
					<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
						
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


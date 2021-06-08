<?php
	// Initialiser la session
	session_start();
  
$connection = mysqli_connect("localhost","root","","appticket");
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location:../login.php");
		exit(); 
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Charts</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style-nav.css">

  </head>
  <body>
  <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	         
		    
            <a href="accueil.php">Add_User</a>
	          </li>
	          <li>
            <a href="profileTS.php">profile</a>
	          </li>
	          <li>
              <a href="tickets.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tickets</a>
              
	          </li>
	          <li>
              <a href=" /logout.php">Logout</a>
	          </li>
	        
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	<a href="home.php" target="_blank">Repaire.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
            
                <li class="nav-item">
                LOGO
                </li>
               
              </ul>
            </div>
          </div>
        </nav>
<h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
<p>C'est votre espace technicien.</p>
<div class="container-fluid">
    <div class="card shadow md-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-blod text-primary">technicien Profile
            <button type="button">
			<a  href="adduser.php">Add user</a> |
            </button>
            </h6>
        
            <div class="table-reponsive">
                <?php
                $connection = mysqli_connect("localhost","root","","appticket");
                $query = "SELECT * FROM users";
                $query_run = mysqli_query($connection,$query);
                
                ?>
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Edit</th>
                            <th>Dellete</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['password'];?></td>
                
                            <td>
                            <form action="edit.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                            <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                            </form>
                            </td>
                            <td>
                            <form action="delete.php" method="POST">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger">Dellete</button>
                            </form>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        else {
                            echo"No Record Found";
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>
</div>

	



<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>

    <script src="js/main.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
  <script src="js/sweetalert.min.js"></script>
 <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
 <script src="sidebars.js"></script>
  </body>
</html>

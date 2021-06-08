

<?php
	// Initialiser la session
	session_start();
  
$connection = mysqli_connect("localhost","root","","appticket");
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location:../login.php");
		exit(); 
	}
  
$con = mysqli_connect("localhost","root","","appticket");
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["password"])){
		header("Location:../login.php");
		exit(); 
	}
  $sql="select * from tickets order by id desc";
$res=mysqli_query($con,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/profile/style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css"
    integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous" />

    <title>My Space</title>
    <style>body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>
</head>
<body>
  
<div class="container">
    <div class="main-body">
                
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['username']; ?></h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['username']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      fip@jukmuh.al
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['password']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (320) 380-4539
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Bay Area, San Francisco, CA
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card">
              <a href="addticket.php" class="btn btn-primary btn-lg">
                 <i class="fas fa-plus"></i> Add Ticket
                </a>

             
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          
                            <th>id</th>
                            <th>tickettitle</th>
                            <th>type</th>
                            <th>level</th>
                            <th>startDate</th>
                            <th>takeDate	</th>
                            <th>detail</th>
                            <th>user</th>
                            <th>techn</th>
                            <th> dateFin</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i=1;
                      while($row=mysqli_fetch_assoc($res)){
                                ?>
                        <tr>
                   
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['tickettitle'];?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['level'];?></td>
                            <td><?php echo $row['startDate']; ?></td>
                            <td><?php echo $row['takeDate']; ?></td>
                            <td><?php echo $row['detail'];?></td>
                            <td><?php echo $row['user'];?></td>
                            <td><?php echo $row['tech']; ?></td>
                            <td><?php echo $row['dateFin']; ?></td>
                            </td>
                    <!--button delete-->
                    <form action="edit.php" method="GET">
                    <td> 
                            <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                           
                            <a  class="btn btn-primary" href="edit.php?id=<?php echo "$id";?>">edit
                      </a> </td>
                            </form>
                            
                            <form action="delete.php" method="GET">
                    <td> 
                            <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                           
                            <a  class="btn btn-danger" href="delete.php?id=<?php echo "$id";?>">Delete
                      </a> </td>
                            </form>
                            
                       
                  </tr>
                        <?php     } ?>
                </table>
        </div>
    </div>
</div>




              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>

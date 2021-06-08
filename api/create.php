<?php

  $conn  = mysqli_connect ('localhost','root','','application');
  /*chek connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";*/
  //insert data to the tickets table
  $tickettitle =$_POST["tickettitle"];
  $startDate =$_POST["startDate"];
  $dateFin =$_POST["dateFin"];
  $type =$_POST["type"];
  $level =$_POST["level"];
  $detail =$_POST["detail"];
  $query = "INSERT INTO tickets (tickettitle, startDate, dateFin, type , level , detail) VALUES ('$tickettitle', '$startDate', '$dateFin', '$type' , '$level' , '$detail')";  
  $query_run= mysqli_query($conn,$query)   ;
  //header("location:userspace.php");

    echo 1;


?>
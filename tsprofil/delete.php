
<?php
    $connection = mysqli_connect("localhost","root","","appticket");
    $query = "SELECT * FROM users";
    $query_run = mysqli_query($connection,$query);
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];
    $query = "DELETE FROM users WHERE id='$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
        {
        
            $_SESSION['success'] = "Your Data is Deleted";
            header('Location: accueil.php');
        }
        else
        {
            
            $_SESSION['status'] = "Your Data is NOT Deleted";
            header('Location: accueil.php');
        }
}
?>
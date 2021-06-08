<?php
 require('function.php');
 $con=mysqli_connect("localhost","root","","appticket");
 

 $tickettitle='';
 $type='';
 $level='';
 $startDate='';
 $takeDate='';
 $detail="";
 $user='';
 $tech='';
 $dateFin='';

 if (isset($_GET['id']) && $_GET['id']!=''){

    $id=mysqli_real_escape_string($con,$_GET['id']);
    $res=mysqli_query($con,"select * from tickets where name='$name'");
    $row=mysqli_fetch_assoc($res);
 
   
    }
    
 
if (isset($_POST['submit'])){
    $tickettitle= mysqli_real_escape_string($con,$_POST['tickettitle']);
    $name= mysqli_real_escape_string($con,$_POST['type']);
    $level== mysqli_real_escape_string($con,$_POST['level']);
    $startDate= mysqli_real_escape_string($con,$_POST['startDate']);
    $qty= mysqli_real_escape_string($con,$_POST['takeDate']);
    $short_desc= mysqli_real_escape_string($con,$_POST['detail']);
    $meta_title= mysqli_real_escape_string($con,$_POST['user']);
    $meta_desc= mysqli_real_escape_string($con,$_POST['tech']);
    $meta_keyword= mysqli_real_escape_string($con,$_POST['dateFin']);;
    if (isset($_GET['id']) && $_GET['id']!=''){
        mysqli_query($con,"update tickets set categorie_id=$categorie_id
        tickettitle=$name,mrp=$mrp, price=$price, qty=$qty,short_desc=$short_desc, meta_title=$meta_title, meta_desc=$meta_desc, meta_keyword=$meta_keyword, product=$product, where id='$id'");
    }else{
        mysqli_query($con,"insert into product (categorie_id,mrp,price,qty,short_desc,meta_title,meta_desc,meta_keyword,status)values('$categorie_id','$name','$mrp','$price','$qty','$short_desc','$meta_title','$meta_desc''$meta_keyword',1)");
  
} 
header('location:product.php');
   die();

  
}



?>
<form class="box" action="" method="post">

    <h1 class="box-title">Product</h1>
                            <select name="categorie_id" class="box-input" id="">
<option value="">Select Categories</option>
<?php
$res=mysqli_query($con,"select id,categorie from categorie order by categorie asc");
while ($row=mysqli_fetch_assoc($res)) {
   echo"<option value=".$row['categorie'].">".$row['categorie']."</option>";
}

?> 
                            </select>
	
    <input type="text" class="box-input" name="name" placeholder="product_name" required value="<?php echo $name;?>"  />
    <input type="text" class="box-input" name="mrp" placeholder="mrp" required value="<?php echo $mrp;?>"  />
    <input type="text" class="box-input" name="price" placeholder="price" required value="<?php echo $price;?>"  />
    <input type="text" class="box-input" name="qty" placeholder="qty" required value="<?php echo $qty;?>"  />
    <input type="file" class="box-input" name="image"  required   />
    <input type="text" class="box-input" name="short_desc" placeholder="short_desc" required value="<?php echo $short_desc;?>"  />
    <input type="text" class="box-input" name="description" placeholder="description" required value="<?php echo $description;?>"  />
    <input type="text" class="box-input" name="meta_title" placeholder="meta_title" required value="<?php echo $meta_title;?>"  />
    <input type="text" class="box-input" name="meta_desc" placeholder="meta_desc" required value="<?php echo $meta_desc;?>"  />
   
    <input type="text" class="box-input" name="meta_keyword" placeholder="meta_keyword" required value="<?php echo $meta_keyword;?>"  />
    <input type="submit" name="submit" value="+add" class="box-button" />
</form>


</body>
</html>

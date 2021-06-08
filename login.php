<!DOCTYPE html>
<html>
<head>

</head>
<style>
		<?php include 'admin/style.css'; ?>
</style>
<body>
<?php
require('api/login.php');?>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title"><a href="https://waytolearnx.com/">
<img class="animate__animated animate__swing"src="images/undraw_laravel_and_vue_59tp.svg" alt=""style="width:200px;"></a></h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>
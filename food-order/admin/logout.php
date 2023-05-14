<?php include("config/constrain.php") ?>
<?php 
unset($_SESSION['user']);
Session_destroy();

header("location:login.php");


?>
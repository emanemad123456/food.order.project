<?php 

if($_SESSION['user']){
    $_SESSION['not-login']="<div class='fail'>please log in</div>";
    header("location:login.php");
}


?>
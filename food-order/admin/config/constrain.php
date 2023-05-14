<?php
session_start();
define("SITEURL","http://localhost/food-order/");
define("LOCALHOST","localhost");
define("db_username","root");
define("db_password","");
define("db_name","food-order");

$dbc=mysqli_connect(LOCALHOST,db_username,db_password) or die(mysqli_error($dbc))  ;
 $dbs=mysqli_select_db($dbc,db_name) or die(mysqli_error($dbc));


?>
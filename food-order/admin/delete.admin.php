<?php include("config/constrain.php") ?>
<?php
$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";
$res = mysqli_query($dbc, $sql);
if ($res) {

   $_SESSION["delete"] = "<div class='sucess'>Admin deleted sucessfully.</div>";

   header("location:manage.admin.php");
} else {
   $_SESSION["delete"] = "<div class='fail'>Failed to delete admin try again in a few laters</div>";
}




?>
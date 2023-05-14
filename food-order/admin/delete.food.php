
<?php include("config/constrain.php") ?>
<?php
if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];


    if ($image_name != "" ) {
        $path = "../images/" . $image_name;
       unlink($path);
        
    }
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    $res = mysqli_query($dbc, $sql);
    if ($res) {

        $_SESSION["delete-food"] = "<div class='sucess'>Food deleted sucessfully.</div>";


        header("location:manage.food.php");
    } else {
        $_SESSION["delete-food"] = "<div class='fail'>Failed to delete food try again in a few laters</div>";
        header("location:manage.food.php");
    }
}





?>
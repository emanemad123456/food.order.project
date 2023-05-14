<?php include("config/constrain.php") ?>
<?php
if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];


    if ($image_name != "" && $id) {
        $path = "../images/" . $image_name;
        unlink($path);
    }
    $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = mysqli_query($dbc, $sql);
    if ($res) {

        $_SESSION["delete-category"] = "<div class='sucess'>Category deleted sucessfully.</div>";


        header("location:manage.categories.php");
    } else {
        $_SESSION["delete-category"] = "<div class='fail'>Failed to delete category try again in a few laters</div>";
        header("location:manage.categories.php");
    }
}





?>
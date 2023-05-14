<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>
<div class="category">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
        <?php
        if (isset($_SESSION['not-add-photo']))
            echo $_SESSION['not-add-photo'] . "<br><br><br>";
        unset($_SESSION['not-add-photo']);
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <table style="width: 40% ;" class="form-update">
                <tr>

                    <td>Title</td>
                    <td><input type="text" name="title" id="" placeholder="category title"></td>


                </tr>
                <tr>
                    <td>Select photo</td>
                    <td>
                        <input type="file" name="image" value="select-photo">


                    </td>
                </tr>
                <tr>
                    <td>Feauture</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td><label for="">Active</label></td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>




            </table>
            <br><br>
            <button class="btn-1" name="sumbit">Add Category</button>
        </form>

    </div>
</div>
<?php include("partials/footer.php") ?>
<?php
if (isset($_POST['sumbit'])) {

    $title = $_POST['title'];

    if (isset($_POST['featured'])) {
        $feature = $_POST['featured'];
    } else {
        $feature = "No";
    }
    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }



    $image_name = $_FILES['image']['name'];
    if ($image_name != "") {
        $exe = end(explode('.', $image_name));
        $image_name = "Food_category_" . rand(000, 999) . "." . $exe;
        $image_source = ($_FILES['image']['tmp_name']);
        $img_dest = ("../images/" . $image_name);
        $upload = move_uploaded_file($image_source, $img_dest);
        if (!$upload) {

            $_SESSION["not-add-photo"] = "<div class='fail'>failed to upload photo,please try again</div>";

            header("location:add.food.php");
            die();
        }
    }

    $sql = "INSERT INTO tbl_category SET
         title='$title', 
              active='$active',
             feauture='$feature',
             image_name='$image_name'
             
              ";
            
    $res = mysqli_query($dbc, $sql);
    if ($res) {
        $_SESSION['add-category'] = "<div class='sucess'>Category Added sucessfully</div>";


        header("location:manage.categories.php");
    } else {
        $_SESSION['add-categoy'] = "<div class='fail'>Caregory not added</div>";


        header("location:add.category.php");
    }
}

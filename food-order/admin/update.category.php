<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>
<?php
if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    // echo $image_name;



    $sql = "SELECT * FROM tbl_category WHERE id=$id";
    $res = mysqli_query($dbc, $sql);
    if ($res) {

        $count = mysqli_num_rows($res);


        if ($count) {


            $rows = mysqli_fetch_assoc($res);
            $title = $rows['title'];
            // $image_name = $rows['image_name'];
            $active = $rows['active'];

            $feauture  = $rows['feauture'];
        }
    }
} else {
    $_SESSION['update-category'] = "<div class=fail >No category found </div>";
    header("location:manage.categories.php");
}

?>
<div class="category">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>


        <form action="" method="post" enctype="multipart/form-data">
            <table style="width: 40% ;" class="form-update" class="table-addadmin">
                <tr>

                    <td>Title</td>
                    <td><input type="text" name="title" id="" value="<?php echo $title ?>"></td>


                </tr>
                <tr>
                    <td>Current Photo</td>

                    <?php
                    if ($image_name == "") {
                        echo "<td ><div class='fail'>Image not added</div></td>";
                    } else { ?>
                        <td> <img src='../images/<?php echo $image_name ?>' alt='' srcset=''></td>
                </tr>
                <tr>
                    <td>Current-image-name</td>
                    <td><input type="text" name="image_name" value="<?php echo $image_name ?>"></td>
                    <!-- <td><input type="text" name="title1" id="" value="<?php echo $image_name ?>"></td> -->
                <?php  }


                ?>





                </tr>
                <tr>
                    <td>New photo</td>
                    <td><input type="file" name="image" value="select-photo"></td>
                </tr>
                <tr>
                    <td>Feauture</td>
                    <td>
                        <input type="radio" name="featured" value="Yes" <?php if ($feauture  == "Yes") echo "checked" ?>>Yes
                        <input type="radio" name="featured" value="No" <?php if ($feauture  == "No") echo "checked" ?>>No
                    </td>
                </tr>
                <tr>
                    <td><label for="">Active</label></td>
                    <td>
                        <input type="radio" name="active" value="Yes" <?php if ($active == "Yes") echo "checked" ?>>Yes
                        <input type="radio" name="active" value="No" <?php if ($active == "No") echo "checked" ?>>No
                    </td>
                </tr>




            </table>
            <br><br>
            <button class="btn-1" name="sumbit">Update Category</button>
        </form>

    </div>
</div>
<?php include("partials/footer.php") ?>
<?php
if (isset($_POST['sumbit'])) {

    $title = $_POST['title'];


   


    $active = $_POST['active'];
    $feauture = $_POST['featured'];

    $new_image_name = $_FILES['image']['name'];
    // echo $_FILES['image']['name'];
    // echo $_POST['active'];
    // echo $_POST['image_name'];
    // echo $_POST['featured'];
    // echo $_POST['title'];
    if ($new_image_name != "") {

        $exe = end(explode('.', $new_image_name));
        $new_image_name = "Food_category_" . rand(000, 999) . "." . $exe;
        $image_source = ($_FILES['image']['tmp_name']);
        $img_dest = ("../images/" . $new_image_name);
        $upload = move_uploaded_file($image_source, $img_dest);
        if (!$upload) {

            $_SESSION["not-add-photo-update"] = "<div class='fail'>failed to upload photo to update category,please try again</div>";

            header("location:update.categories.php");
            die();
        }
        
        $path = "../images/" . $image_name;
        unlink($path);
        
       
    }else{
        $new_image_name = $image_name;
    }






    $sql2 = "UPDATE tbl_category SET
         title='$title', 
              active='$active',
            feauture ='$feauture',
             image_name='$new_image_name'
             WHERE id=$id
             
              ";
             
    $res = mysqli_query($dbc, $sql2);
    echo $res;

    if ($res) {
        // $count = mysqli_num_rows($res);
        // echo $count;
        // die();
        // if ($count ) {

            $_SESSION['update-category'] = "<div class='sucess'>Category updated sucessfully</div>";


            header("location:manage.categories.php");
        }
    
else {
    $_SESSION['update-categoy'] = "<div class='fail'>Caregory not updated</div>";


    header("location:manage.categories.php");
}
}
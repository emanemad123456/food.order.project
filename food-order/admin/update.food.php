<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>
<?php
ob_start();
if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    // echo $id;
    // die();
   



    $sql = "SELECT * FROM tbl_food WHERE id=$id";
    $res = mysqli_query($dbc, $sql);
    if ($res) {

        $count = mysqli_num_rows($res);


        if ($count>0) {


            $rows = mysqli_fetch_assoc($res);
            $title = $rows['title'];
            $describee=$rows['describee'];
            $active = $rows['active'];
            $price = $rows['price'];
            $category_id=$rows['category_id'];


            $feature  = $rows['feature'];
      
        }
} else {
    $_SESSION['error'] = "<div class=fail >you should enter id and image_name[fail]</div>";
    header("location:manage.food.php");
}

?>
<div class="category">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>


        <form action="" method="post" enctype="multipart/form-data">
            <table style="width: 40% ;" class="form-update" class="table-addadmin">
                <tr>

                    <td>Title</td>
                    <td><input type="text" name="title" id="" value="<?php echo $title ?>"></td>

                    <tr>
                    <td>Description</td>
                    <td>
                    
                        <textarea name="describee" id="" cols="30" rows="5" ><?php echo $describee?></textarea>



                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td> <input type="number" name="price" placeholder="" value="<?php echo $price ?>"> </td>

                </tr>
                </tr>
                <tr>
              
                    <td>Category</td>
                    <td>
                        <select name="category" id="" autofocus>
                            <?php
                             $sql2 = "SELECT * FROM tbl_category WHERE active='Yes'";
                             $res = mysqli_query($dbc, $sql2);
                             $count = mysqli_num_rows($res);
                            //  echo $count;
                            
                             $idi=1;
                             if($res){
                                if($count>0){
                                    while ($rows = mysqli_fetch_assoc($res)) {
                                        $id_category=$rows['id'];
                                        $title_category=$rows['title'];
                                        ?>
                                        <!-- <option se value=""></option> -->
                                        <option <?php if($id_category==$category_id) echo "selected"?> value="<?php echo $id_category ?>" ><?php echo $title_category ?></option>
                                        <?php 


                                    }
                                }
                                else{
                                    ?>
                                     <option value="0"> <div class='fail'>No category</div></option>
                                    <?php 
                                }
                            }
                            $_SESSION['update-food']="<div class='fail'>can not update food</div>";
                            ?>
                            
                        </select>
                    </td>
                </tr>
              
               
                

                
                <tr>
                    <td>Current Photo</td>

                    <?php
                    
                    if ($image_name == "") {
                        echo "<td ><div class='fail'>Image not added</div></td>";
                        
                    } else { ?>
                        <td> <img src='../images/<?php echo $image_name ?>' alt='' srcset=''></td>
                        <?php }?>
                </tr>
                    
                <tr>
                    <td>New photo</td>
                    <td><input type="file" name="image" value="select-photo"></td>
                </tr>
                <tr>
                    <td>Feauture</td>
                    <td>
                        <input type="radio" name="feature" value="Yes" <?php if ($feature  == "Yes") echo "checked" ?>>Yes
                        <input type="radio" name="feature" value="No" <?php if ($feature  == "No") echo "checked" ?>>No
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
            <button class="btn-1" name="sumbit">Update Food</button>
        </form>

    </div>
</div>
<?php include("partials/footer.php") ?>
<?php

if (isset($_POST['sumbit'])) {

    $title = $_POST['title'];

    


    $active = $_POST['active'];
    $feauture = $_POST['feature'];
    $category_id=$_POST['category'];

    $new_image_name = $_FILES['image']['name'];
    $price=$_POST['price'];
    $describee=$_POST['describee'];

    // echo $_FILES['image']['name'];
    // echo $_POST['active'];
    
    // echo $_POST['feature'];
    // echo $_POST['title'];
    // echo $category_id;
    // echo $title;
    // echo $price;
    // die();
   
    if ($new_image_name != "") {

        $exe = end(explode('.', $new_image_name));
        $new_image_name = "Food_category_" . rand(000, 999) . "." . $exe;
        $image_source = ($_FILES['image']['tmp_name']);
        $img_dest = ("../images/" . $new_image_name);
        $upload = move_uploaded_file($image_source, $img_dest);
        if (!$upload) {

            $_SESSION["not-add-photo-update"] = "<div class='fail'>failed to upload photo to update food,please try again</div>";

            header("location:manage.food.php");
            die();
        }
        
        $path = "../images/" . $image_name;
        unlink($path);
        
       
    }else{
        $new_image_name = $image_name;
    }






    $sql2 = "UPDATE tbl_food SET
         title='$title', 
              active='$active',
            feature ='$feauture',
             image_name='$new_image_name',
             describee='$describee',
             price='$price',
             category_id='$category_id'
             WHERE id=$id
             
              ";
            //   echo $sql2;
            //   die();
             
    $res = mysqli_query($dbc, $sql2);
    echo $res;
    // die();

    if ($res) {
        // $count = mysqli_num_rows($res);
        // echo $count;
        // die();
        // if ($count ) {

            $_SESSION['update-food'] = "<div class='sucess'>Food updated sucessfully</div>";


            header("location:manage.food.php");
        }
    
else {
    $_SESSION['update-food'] = "<div class='fail'>Food not updated</div>";


    header("location:manage.food.php");
}
}}
ob_end_flush();
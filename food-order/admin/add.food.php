<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>

<div class="category">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>
        <?php
        if (isset($_SESSION['not-add-category']))
            echo $_SESSION['not-add-category'] . "<br><br><br>";
        unset($_SESSION['not-add-category']);
        ?>


        <form action="" method="post" enctype="multipart/form-data">
            <table style="width: 40% ;" class="form-update">
                <tr>

                    <td>Title</td>
                    <td><input type="text" name="title" id="" placeholder=""></td>


                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <!-- <input type="text" name="description" id="" cols="30" rows="5"/> -->
                        <textarea name="describee" id="" cols="30" rows="5"></textarea>



                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td> <input type="text" name="price" placeholder="" value="0" ></td>

                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" id="">
                            <?php
                             $sql2 = "SELECT * FROM tbl_category WHERE active='Yes'";
                             $res = mysqli_query($dbc, $sql2);
                             $count = mysqli_num_rows($res);
                             $idi=1;
                             if($res){
                                if($count>0){
                                    while ($rows = mysqli_fetch_assoc($res)) {
                                        $id=$rows['id'];
                                        $title=$rows['title'];
                                        ?>
                                        
                                        <option value="<?php echo $id ?>"><?php echo $title ?></option>
                                        <?php 


                                    }
                                }else{
                                    ?>
                                     <option value="0"> <div class='fail'>No category</div></option>
                                    <?php 
                                }
                            }
                            ?>
                            <!-- <option value="1">food</option>
                            <option value="2">search</option> -->
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image" value="select photo"></td>
                </tr>
                <tr>
                    <td>Feature</td>
                    <td>
                        <input type="radio" name="feature" value="Yes">Yes
                        <input type="radio" name="feature" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>

                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>





            </table>
            <br><br>
            <button class="btn-1" name="sumbit">Add Food</button>
        </form>


    </div>
</div>
<?php include('partials/footer.php') ?>

<?php
if (isset($_POST['sumbit'])) {


    $title = $_POST['title'];
    // $image_name = "";
    $image_name = $_FILES['image']['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category'];
    $describee = $_POST['describee'];

    if (isset($_POST['feature'])) {
        $feature = $_POST['feature'];
    } else {
        $feature = "No";
    }
    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }




    if ($image_name != "") {
        // $image_name = $_FILES['image']['name'];
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
    // echo $title;
    // echo $describee;
    // echo $price;
    // echo $feature;
    // echo $active;
    // echo $category_id;
    // echo $image_name;

   
    $sql = "INSERT INTO tbl_food SET 
    title='$title',  
    price=$price,
    image_name='$image_name',
   describee='$describee', 
   feature='$feature' ,
   active='$active' ,
   category_id=$category_id  
   ";






    $res = mysqli_query($dbc, $sql);
   
    
    if ($res) {
        $_SESSION['add-food'] = "<div class='sucess'>Food Added sucessfully</div>";


        header("location:manage.food.php");
    } else {
        $_SESSION['add-food'] = "<div class='fail'>Food not added</div>";


        header("location:manage.food.php");
    }
   
}


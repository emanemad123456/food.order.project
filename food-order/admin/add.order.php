<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>

<div class="category">
    <div class="wrapper">
        <h1>Add Order</h1>
        <br><br>
        <?php
        if (isset($_SESSION['not-add-category']))
            echo $_SESSION['not-add-category'] . "<br><br><br>";
        unset($_SESSION['not-add-category']);
        ?>


        <form action="" method="post" enctype="multipart/form-data">
            <table style="width: 40% ;" class="form-update">
                <tr>

                    <td>Food-title</td>
                    <td><input type="text" name="food" id="" placeholder=""></td>


                </tr>
                <tr>
                    <td>Quantity</td>
                   
                    <td>
                        <input type="number" name="qunantity">
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td> <input type="number" name="price" placeholder=""  ></td>

                </tr>
                <tr>
                    <td>Total</td>
                    <td> <input type="number" name="price" placeholder=""   ></td>

                </tr>
                <tr>
                    <td>Customer-name</td>
                    <td>
                       <input type="text" name="Customer-name">
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Customer-email</td>
                    <td>
                       <input type="text" name="Customer-email">
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Customer-cotact</td>
                    <td>
                       <input type="text" name="Customer-contact">
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Customer-address</td>
                    <td>
                       <input type="text" name="Customer-address">
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Order-date</td>
                    <td>
                       <input type="date" name="order-date">
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



<?php include('partials-front/menu.php') ?>
<?php
ob_start();

if (isset($_GET['id'])) {
    $food_id = $_GET['id'];
    $sql = "SELECT * from tbl_food WHERE id=$food_id ";

    $res = mysqli_query($dbc, $sql);

    $count = mysqli_num_rows($res);






    if ($res) {
        if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                $id = $rows['id'];
                $title = $rows['title'];

                $image_name = $rows['image_name'];
                $price = $rows['price'];
                $category_id = $rows['category_id'];
                $description = $rows['describee'];
            }
        } else {
            header('location :' . SITEURL);
        }
    }
} else {
    header('location :' . SITEURL);
}



?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">


        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" class="order" method="POST">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <!-- <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve"> -->
                    <?php if ($image_name == "") {
                        echo "<div class='fail'>Image not available</div>";
                    } else {


                    ?>
                        <img src="<?php echo SITEURL ?>images/<?php echo $image_name ?>" alt="<?php echo $title ?>" class="img-responsive img-curve">
                    <?php } ?>
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title ?></h3>
                    <input type="hidden" name='food' value="<?php echo $title ?>">
                    <p class="food-price"><?php echo $price ?></p>
                    <input type="hidden" name='price' value="<?php echo $price ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                <!-- <button name="submit" class="btn btn-primary">Confirm order</button> -->

            </fieldset>

        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- social Section Starts Here -->
<section class="social">
    <div class="container text-center">
        <ul>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
            </li>
        </ul>
    </div>
</section>
<!-- social Section Ends Here -->

<?php include('partials-front/footer.php') ?>
<?php


if (isset($_POST['submit'])) {


    $full_name = $_POST['full-name'];
    $contact = $_POST['contact'];
    $qty = $_POST['qty'];
    $title = $_POST['food'];
    $price = $_POST['price'];
    $status = "ordered";
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date = date('y.m.d h:i:sa');
    // $date=$_POST['date'];
    // $date=time();


    $sql2 = "INSERT INTO tbl_order SET 
food='$title' ,
qunantity =$qty ,
status='$status' ,
price=$price ,
total=$qty*$price ,
order_date='$date' ,
customer_name='$full_name' ,
customer_contact='$contact' ,
customer_email='$email' ,
customer_address='$address' 

";

    $res = mysqli_query($dbc, $sql2);

    if ($res) {
        $_SESSION['order'] = "<div class='sucess'>Order Added sucessfully</div>";


        header('location: index.php');
    } else {
        $_SESSION['order'] = "<div class='fail'>Order not added</div>";

echo "kkk";
        header('location: index.php');
    }
}
ob_end_flush();

?>
<?php include('partials-front/menu.php') ?>
<!-- Navbar Section Ends Here -->
<?php

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $category_name=$_GET['category_name'];
    $sql = "SELECT title FROM tbl_food WHERE category_id=$category_id";
    $res = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($res);
   

    $count = mysqli_num_rows($res);
    if ($res) {
        if ($count > 0) {
        }
    }
} else {
    header('location :' . SITEURL);
}



?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on <a href="#" class="text-white"><?php echo $category_name?></a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";
        $res = mysqli_query($dbc, $sql2);
        // $rows = mysqli_fetch_assoc($res);
       

        $count = mysqli_num_rows($res);
        if ($res) {
            if ($count > 0) {
                while($rows = mysqli_fetch_assoc($res)){
                $price = $rows['price'];
                $id=$rows['id'];
                $image_name = $rows['image_name'];
                // $title = $row['title'];

                $describee = $rows['describee'];
                $title = $rows['title'];
        ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                    <?php if ($image_name == "") {
                                echo "<div class='fail'>Image not available</div>";
                            } else {


                            ?>
                                <img src="<?php echo SITEURL ?>images/<?php echo $image_name ?>" alt="<?php echo $title ?>" class="img-responsive img-curve">
                        <?php }?>
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title ?></h4>
                        <p class="food-price"><?php echo $price ?></p>
                        <p class="food-detail">
                            <?php echo $describee ?>
                        </p>
                        <br>

                        <a href="<?php echo SITEURL ?>order.php?id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
        <?php }
            } else {
                echo "<div class='fail'>No food found</div>";
            }
        }




        ?>












        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

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
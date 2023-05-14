<?php include('partials-front/menu.php') ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <?php
        $search =mysqli_real_escape_string($dbc,$_POST['search']) ;


        ?>

        <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search ?></a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $sql = "SELECT * from tbl_food WHERE title LIKE '%$search%' OR describee='%$search%' ";

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
                    $price = $rows['price'];
                    $price = $rows['price'];
                    $price = $rows['price'];

        ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php if ($image_name == "") {
                                echo "<div class='fail'>Image not available</div>";
                            } else {


                            ?>
                                <img src="<?php echo SITEURL ?>images/<?php echo $image_name ?>" alt="<?php echo $title ?>" class="img-responsive img-curve">
                            <?php } ?>
                        </div>


                        <div class="food-menu-desc">
                            <h4><?php echo $title ?></h4>
                            <p class="food-price"><?php echo $price?></p>
                            <p class="food-detail">
                                <?php echo $description ?>
                            </p>
                            <br>

                            <a href="order.html" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>







        <?php }
            
        } else {

            echo "<div class='fail'>No food found</div>";
        }}
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
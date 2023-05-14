<?php include('partials-front/menu.php') ?>
<!-- Navbar Section Ends Here -->

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php
        if (isset($_SESSION['order']))
            echo $_SESSION['order'] . "<br><br><br>";
        unset($_SESSION['order']);
        ?>


        <?php
        $sql = "SELECT * from tbl_category WHERE active='Yes' AND feauture='Yes' LIMIT 3";

        $res = mysqli_query($dbc, $sql);

        $count = mysqli_num_rows($res);





        if ($res) {
            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $title = $rows['title'];
                    

                    $image_name = $rows['image_name'];

        ?>
                    <a href="<?php echo SITEURL ?>category-foods.php?category_id=<?php echo $id ?>&category_name=<?php echo $title ?>">
                        <div class="box-3 float-container">
                            <?php
                            if ($image_name != "") {



                            ?>


                                <img src="<?php echo SITEURL ?>images/<?php echo $image_name ?>" alt="<?php echo $title ?>" class="img-responsive img-curve">
                            <?php

                            } else {
                                echo "<div class='fail'>Image not available</div>";
                            }
                            ?>

                            <h3 class="float-text text-white"><?php echo $title ?></h3>
                        </div>
                    </a>

        <?php
                }
            } else {
                echo "<div class='erroe'>No Category found</div>";
            }
        }
        ?>







        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $sql = "SELECT * from tbl_food WHERE active='Yes' AND feature='Yes' LIMIT 6 ";

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
                    // $price = $rows['price'];
                    // $price = $rows['price'];
                    // $price = $rows['price'];

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
                            <p class="food-price"><?php echo "$ ".$price ?></p>
                            <p class="food-detail">
                                <?php echo $description ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL ?>order.php?id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>







        <?php }
            }
        } else {

            echo "<div class='erroe'>No Category found</div>";
        }
        ?>



        <div class="clearfix"></div>



    </div>
</section>


<p class="text-center">
    <a href="#">See All Foods</a>
</p>
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
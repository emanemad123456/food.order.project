<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>

<div class="category">
    <div class="wrapper">
        <div><strong>Dashboard</strong></div><br><br><br>
        <?php
        if (isset($_SESSION['login_sucess']))
            echo $_SESSION['login_sucess'];
        unset($_SESSION['login_sucess']);
        ?>

        <div class="col-4">
            <?php
            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($dbc, $sql);

            $count = mysqli_num_rows($res);


            ?>
            <h1><?php echo $count ?></h1>
            <br>
            Categories
        </div>
        <div class="col-4">
            <?php
            $sql = "SELECT * FROM tbl_food";
            $res = mysqli_query($dbc, $sql);

            $count = mysqli_num_rows($res);


            ?>
            <h1><?php echo $count ?></h1>
            <br>
            Foods
        </div>

        <div class="col-4">
            <?php
            $sql = "SELECT * FROM tbl_order";
            $res = mysqli_query($dbc, $sql);

            $count = mysqli_num_rows($res);


            ?>
            <h1><?php echo $count ?></h1>
            <br>
            Orders
        </div>
        <div class="col-4">
            <?php
            $sql = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='delivered' ";
            $res = mysqli_query($dbc, $sql);
            $row = mysqli_fetch_assoc($res);



            $count = $row['Total'];
            if ($count == 0) {
            ?>
                <h1><?php echo " 0"  ?></h1>
            <?php
            } else {
            ?>
                <h1><?php echo "$ " . $count ?></h1>
            <?php } ?>
            <br>
            Revenu-centered
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php include("partials/footer.php") ?>
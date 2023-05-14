<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>

<div class="category">
    <div class="wrapper">
        <h1>Manage Order</h1>
        <br><br>
        <a class="btn-1" href="add.order.php">Add order</a>
        <br><br><br>
        <?php
        if (isset($_SESSION['update-order']))
            echo $_SESSION['update-order'] . "<br><br><br>";
        unset($_SESSION['update-order']);
        ?>


        <table class="table-admin">
            <tr>
                <th>S.N</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Order-date</th>
                <th>Status</th>
                <th>Customer-name</th>
                <th>Customer-email</th>
                <th>Customer-address</th>
                <th>Customer-contact</th>
                <th>Actions</th>

            </tr>
            <?php
            $sql = "SELECT * from tbl_order ORDER BY id DESC";
            $res = mysqli_query($dbc, $sql);

            $count = mysqli_num_rows($res);
            $idi = 1;



            if ($res) {
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $food = $rows['food'];
                        $id = $rows['id'];
                        $quantity = $rows['qunantity'];
                        $price = $rows['price'];
                        $full_name = $rows['customer_name'];
                        $email = $rows['customer_email'];
                        $contact = $rows['customer_contact'];
                        $address = $rows['customer_address'];

                        $total = $rows['total'];
                        $date = $rows['order_date'];
                        $status = $rows['status'];








            ?>
                        <tr>
                            <td><?php echo $idi++ ?></td>
                            <td><?php echo $food ?></td>
                            <td><?php echo $price ?></td>
                            <td><?php echo $quantity ?></td>
                            <td><?php echo $total ?></td>


                            <td><?php echo $date ?></td>

                            <td>
                                <?php
                                if ($status == 'ordered') echo "<div style='color: orange;'>ordered</div>";
                                else  if ($status == 'delivered') echo "<div style='color: green;'>delivered</div>";
                                else if ($status == 'ordered') echo "<div style='color: black;'>on delivery</div>";
                                else if ($status == 'ordered') echo "<div style='color: yellow;'>canceled</div>";



                                ?>

                            </td>

                            <td><?php echo $full_name ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $address ?></td>
                            <td><?php echo $contact ?></td>
















                            <td>
                                <a class="btn-2" href="update.order.php?id=<?php echo $id ?>">Update Order</a>



                            </td>
                        </tr>







                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="12">
                            <div class='fail'>No order were added to be showed</div>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>

    </div>
</div>

<?php include("partials/footer.php") ?>
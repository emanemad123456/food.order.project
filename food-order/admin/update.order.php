<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>
<?php
ob_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];




    $sql = "SELECT * FROM tbl_order WHERE id=$id";
    $res = mysqli_query($dbc, $sql);
    if ($res) {

        $count = mysqli_num_rows($res);


        if ($count > 0) {


            $rows = mysqli_fetch_assoc($res);
            $food = $rows['food'];
            $price = $rows['price'];
            $qt = $rows['qunantity'];
            $status = $rows['status'];
            $full_name = $rows['customer_name'];
            $email = $rows['customer_email'];
            $address = $rows['customer_address'];
            $contact = $rows['customer_contact'];
        }
    } else {
        $_SESSION['error'] = "<div class=fail >you should enter id [fail]</div>";
        header("location:manage.order.php");
    }

?>
    <div class="category">
        <div class="wrapper">
            <h1>Update Order</h1>
            <br><br>


            <form action="" method="post" enctype="multipart/form-data">
                <table style="width: 40% ;" class="form-update" class="table-addadmin">
                    <tr>

                        <td>food-name</td>
                        <td><?php echo $food ?></td>

                    <tr>
                    <tr>

                        <td>Price</td>
                        <td><?php echo "$ " . $price ?></td>

                    <tr>
                    <tr>
                        <td>Quantity</td>
                        <td>
                            <input type="number" name="qunantity" value="<?php echo $qt ?>">
                        </td>
                    </tr>

                    <td>Status</td>
                    <td>

                        <select name="status" id="">
                            <option <?php if ($status == 'ordered') echo "selected" ?> value="ordered">ordered</option>
                            <option <?php if ($status == 'canceled') echo "selected" ?> value="canceled">canceled</option>
                            <option <?php if ($status == 'delivered') echo "selected" ?> value="delivered">delivered</option>
                            <option <?php if ($status == 'on delivery') echo "selected" ?> value="on delivery">on delivery</option>
                        </select>



                    </td>
                    </tr>

                    <tr>
                        <td>Customer-name</td>
                        <td> <input type="text" name="customer_name" placeholder="" value="<?php echo $full_name ?>"> </td>

                    </tr>
                    <tr>
                        <td>Customer-email</td>
                        <td> <input type="email" name="customer_email" placeholder="" value="<?php echo $email ?>"> </td>

                    </tr>
                    <tr>
                        <td>Customer-contact</td>
                        <td> <input type="text" name="customer_contact" placeholder="" value="<?php echo $contact ?>"> </td>

                    </tr>
                    <tr>
                        <td>Customer-address</td>
                        <td>
                            <textarea name="customer_address" id="" cols="25" rows="5"><?php echo $address ?></textarea>
                        </td>

                    </tr>








                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="price" value="<?php echo $price ?>">




                </table>
                <br><br>
                <button class="btn-1" name="sumbit">Update Order</button>
            </form>

        </div>
    </div>
    <?php include("partials/footer.php") ?>
<?php

    if (isset($_POST['sumbit'])) {




        $qt = $_POST['qunantity'];
        $status = $_POST['status'];
        $full_name = $_POST['customer_name'];
        $email = $_POST['customer_email'];
        $address = $_POST['customer_address'];
        $contact = $_POST['customer_contact'];





        $sql2 = "UPDATE tbl_order SET
         food = '$food' ,
         price=$price ,
         qunantity=$qt ,
         customer_name='$full_name' ,
         customer_email='$email' ,
         customer_address='$address' ,
         customer_contact='$contact' ,
        status='$status' 
         WHERE id=$id";





        $res = mysqli_query($dbc, $sql2);


        if ($res) {


            $_SESSION['update-order'] = "<div class='sucess'>Order updated sucessfully</div>";


            header("location:manage.order.php");
        } else {
            $_SESSION['update-order'] = "<div class='fail'>Order not updated</div>";


            header("location:manage.order.php");
        }
    }
    ob_end_flush();
}

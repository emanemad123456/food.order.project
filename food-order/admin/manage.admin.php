<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>
<div class="category">
    <div class="wrapper">


        <div>
            <h1>Manage Admin</h1>
        </div>
        <br>
        <?php
        if (isset($_SESSION['add']))
            echo $_SESSION['add'];
        unset($_SESSION['add']);
        ?>
        <?php
        if (isset($_SESSION['password-change']))
            echo $_SESSION['password-change'];
        unset($_SESSION['password-change']);
        ?>

        <?php
        if (isset($_SESSION['delete']))
            echo $_SESSION['delete'];
        unset($_SESSION['delete']);
        ?>
        <?php
        if (isset($_SESSION['update']))
            echo $_SESSION['update'];
        unset($_SESSION['update']);
        ?>
        <?php
        if (isset($_SESSION['user-not-found']))
            echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
        ?>
        <?php
        if (isset($_SESSION['match']))
            echo $_SESSION['match'];
        unset($_SESSION['match']);
        ?>
        <br><br><br>

        <a class="btn-1" href="add.admin.php">Add Admin</a>
        <br>
        <br><br>

        <table class="table-admin">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * from tbl_admin";
            $res = mysqli_query($dbc, $sql);
            $rows = mysqli_fetch_assoc($res);
            $count = mysqli_num_rows($res);
            $idi = 1;
            // echo $count;


            if ($res) {
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $username = $rows['username'];
                        $fullname = $rows['full_name'];







            ?>
                        <tr>
                            <td><?php echo $idi++ ?></td>
                            <td><?php echo $fullname ?></td>
                            <td><?php echo $username ?></td>


                            <td>
                                <a class="btn-4" href="<?php echo "update.password.php?id=" ?><?php echo $id ?>">Change Password</a>
                                <a class="btn-2" href="<?php echo "update.admin.php?id=" ?><?php echo $id ?>">Update Admin</a>
                                <a class="btn-3" href="<?php echo "delete.admin.php?id=" ?><?php echo $id ?>">Delete Admin</a>
                            </td>
                        </tr>







                <?php
                    }
                }
            } else { ?>
                <tr>
                    <td colspan="4">
                        <div class='fail'>No admin were added to be showed</div>
                    </td>
                </tr>
            <?php

            } ?>



        </table>



    </div>
</div>

<?php include("partials/footer.php") ?>
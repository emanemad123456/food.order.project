<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>


<div class="category">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <form action="" method="post">
            <table  class="form-update">

                <tr>

                    <td>old password</td>
                    <td><input type="passsword" name="current_password" id="" placeholder="old password"></td>

                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type="password" name="new_password" placeholder="enter new password"></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="confirm_password" placeholder=" reapete your new password"></td>
                </tr>


            </table>
            <br><br>
            <button class="btn-1" name="sumbit">confirm-password</button>
        </form>

    </div>
</div>
<?php include("partials/footer.php") ?>
<?php

if (isset($_POST['sumbit'])) {
    $id = $_GET['id'];
    $old_pass = $_POST['current_password'];
    $new_pass = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $sql3 = "SELECT * FROM tbl_admin  WHERE id=$id AND password='$old_pass' ";
    $res3 = mysqli_query($dbc, $sql3);
    $count3 = mysqli_num_rows($res3);
    echo $count3;



    if ($res3) {


        if ($count3 == 1) {
            $_SESSION['user-not-found'] = "<div class='sucess'>user found</div>";
            if ($new_pass == $confirm_password) {
                $sql2 = "UPDATE tbl_admin SET password='$new_pass' WHERE id=$id ";
                $res2 = mysqli_query($dbc, $sql2);
                if ($res2) {
                    $_SESSION['match'] = "<div class='sucess'>match password</div>";
                    $_SESSION['password-change'] = "<div class='sucess'>password changed sucessfully</div>";
                    header("location: manage.admin.php");
                }
            } else {
                $_SESSION['match'] = "<div class='fail'> not match password </div>";
                $_SESSION['password-change'] = "<div class='fail'>password not changed </div>";
                header("location: manage.admin.php");
            }
        } else {
            $_SESSION['password-change'] = "<div class='fail'>password not changed <br/>Retry to write old-password again </div>";
            // $_SESSION['user-not-found'] = "<div class='fail'>user not found</div>";
            header("location:manage.admin.php");
        }
    } else {
        $_SESSION['user-not-found'] = "<div class='fail'>user not found</div>";
        header("location:manage.admin.php");
    }
}
?>
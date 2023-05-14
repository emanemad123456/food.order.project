<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>
<?php

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_admin WHERE id=$id";
$res = mysqli_query($dbc, $sql);
if ($res) {
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $rows = mysqli_fetch_assoc($res);
        $fullname = $rows['full_name'];
        $username = $rows['username'];
    }
else header("location:manage.admin.php");
}

?>
<div class="category">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <form action="" method="post">
            <table class="form-update">
                <tr>

                    <td>Full Name</td>
                    <td><input type="text" name="full_name" id="" placeholder=<?php echo $fullname ?>></td>

                </tr>
               
                <tr>
                    <td>Username</td>
                   
                    <td><input type="text" value="<?php echo $username?>"></td>
                </tr>
                



            </table>
            <br><br>
            <button class="btn-1" name="sumbit">Update Admin</button>
        </form>

    </div>
</div>

<?php include("partials/footer.php") ?>
<?php
if (isset($_POST['sumbit'])) {
    $fullname = $_POST['full_name'];

    $username = $_POST['username'];

    $sql = "UPDATE tbl_admin SET
    username='$username',
    full_name='$fullname' 
    WHERE id='$id'
    ";

    $res = mysqli_query($dbc, $sql);

    if ($res) {

        $_SESSION["update"] = "<div class='sucess'>Admin updated sucessfully.</div>";

        header("location:manage.admin.php");
    } else {
        $_SESSION["update"] = "<div class='fail'>Failed to update admin try again in a few laters</div>";
    }
}


?>
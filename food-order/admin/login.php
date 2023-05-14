<?php include("config/constrain.php") ;
// include('partials/check.login.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <link rel="stylesheet" href="../css/admin1.css">

</head>

<body>
    <div class="center">
        <h1>Login</h1><br><br>
        <?php
        if (isset($_SESSION['login_fail']))
            echo "<br/>" . $_SESSION['login_fail'] . "<br><br>";
        unset($_SESSION['login_fail']);
        ?>
        <?php
         if (isset($_SESSION['not-login']))
            echo "<br/>" . $_SESSION['not-login'] . "<br><br>";
        unset($_SESSION['not-login']);
        ?>
        <?php
        if (isset($_SESSION['not-login']))
            echo "<br/>" . $_SESSION['not-login'] . "<br><br>";
        unset($_SESSION['not-login']);
        ?>


        <form action="" method="post">
            Username <br>
            <input type="text" placeholder="enter your name" name="username"><br><br>
            Password <br>
            <input type="password" placeholder="enter password" name="password"><br><br>

            <button class="btn-1" name="sumbit">confirm-password</button>

        </form>
    </div>
</body>

</html>

<?php



if (isset($_POST['sumbit'])) {
    $username =mysqli_real_escape_string( $dbc,$_POST['username']);
    $password = $_POST['password'];
    // echo $username;
    // echo $password;
    
    $sql = "SELECT * FROM tbl_admin WHERE password='$password' AND username='$username'";
    $res = mysqli_query($dbc, $sql);
    $count = mysqli_num_rows($res);
    // echo $count;
    if ($res) {
        if ($count == 1) {
            $_SESSION['login_sucess'] = "<div class='sucess'>Logined sucessfully</div>";
            $_SESSION['user']=$username;
            // echo $_SESSION['user'];
            // echo $username;
            // die();
            header("location:index.php");
           
        } 
    else {
        $_SESSION['login_fail'] = "<div class='fail'>username or password not matched</div>";
         header("location:login.php");
    }
}
}

?>
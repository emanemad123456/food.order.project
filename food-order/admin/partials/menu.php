<?php
// include('../config/constrain.php');


// if (!$_SESSION['user']) {
//     $_SESSION['not-login'] = "<div class='fail'>please log in</div>";

//     header("location:login.php");
// } else {
//     header("location:manage.admin.php");
// }
?>
<html>

<head>
    <title>Food order website - Home page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="menu">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage.admin.php">Admin</a></li>
                <li><a href="manage.categories.php">Category</a></li>
                <li><a href="manage.food.php">Food</a></li>
                <li><a href="manage.order.php">ordrer</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>



</body>

</html>
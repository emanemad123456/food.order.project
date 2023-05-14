<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>

    <div class="category">
        <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <form action="" method="post">
            <table  class="form-update">
                <tr>
                    
                   <td>Full Name</td>
                   <td><input type="text" name="full_name" id="" value=""></td>
                    
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value=""></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value=""></td>
                </tr>
                
               
            </table>
            <br><br>
            <button class="btn-1" name="sumbit">Add Admin</button>
        </form>
            
        </div>
    </div>
   
<?php include("partials/footer.php") ?>



<?php 
 
 if(isset($_POST['sumbit'])){
    $fullname=$_POST['full_name'];
    $username=$_POST['username'];
    $password=($_POST['password']);
   

    $sql=" INSERT INTO tbl_admin SET 
full_name='$fullname' ,
username='$username',
password='$password'

 ";
 $res=mysqli_query($dbc,$sql) ;
 if($res) {
    
    $_SESSION["add"]="<div class='sucess'>Admin Added sucessfully.</div>";
   
    header("location:manage.admin.php");
 }
 else {
    $_SESSION["add"]="<div class='fail'>Failed to add new admin try again in a few laters</div>";
    header("location:manage.admin.php");

 }
 
 

 }
 

?>
<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>


<div class="category" >
    <div class="wrapper" " >
        <h1>Manage Food</h1>
        <br><br>
        <a class="btn-1" href="add.food.php">Add food</a>
        <br><br><br>
        <?php
        if (isset($_SESSION['not-add-photo']))
            echo $_SESSION['not-add-photo'] . "<br><br><br>";
        unset($_SESSION['not-add-photo']);
        ?>
        <?php
        if (isset($_SESSION['add-food']))
            echo $_SESSION['add-food'] . "<br><br><br>";
        unset($_SESSION['add-food']);
        ?>
        <?php
        if (isset($_SESSION['delete-food']))
            echo $_SESSION['delete-food'] . "<br><br><br>";
        unset($_SESSION['delete-food']);
        ?>
         <?php
        if (isset($_SESSION['error']))
            echo $_SESSION['error'] . "<br><br><br>";
        unset($_SESSION['error']);
        ?>
         <?php
        if (isset($_SESSION['similarity']))
            echo $_SESSION['similarity'] . "<br><br><br>";
        unset($_SESSION['similarity']);
        ?>
        <?php
        if (isset($_SESSION['update-food']))
            echo $_SESSION['update-food'] . "<br><br><br>";
        unset($_SESSION['update-food']);
        ?>

        
        <table class="table-admin" >
            
            <tr>
                <th>id </th>
                <th>title </th>
                <th>description </th>
                <th> price </th>
                <th>image_name </th>
                <th>image </th>
                <th>category_id </th>
                <th>feature </th>
                <th>active </th>
                <th>actions </th>






            </tr>
            <?php
                $sql = "SELECT * FROM tbl_food";
                $res = mysqli_query($dbc, $sql);
                $count = mysqli_num_rows($res);
                
                $idi=1;
               if($res){
                if($count>0){
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id=$rows['id'];
                        $image_name=$rows['image_name'];
                        ?>
                      
                        <tr>
                       
                                           
    
    
                        <td><?php echo $idi++ ?></td>
                            <td><?php echo $rows['title']  ?></td>
                            <td><?php echo$rows['describee']  ?></td>
                            <td><?php echo $rows['price']  ?></td>

                            
                            
                            <?php
                                if ($image_name == ""){
                                    echo "<td ><div class='fail'>Image not added</div></td>";
                                    echo "<td ><div class='fail'>Image not added</div></td>";
                                }
                               
                                else{?>
                                    <td><?php echo $image_name ?></td>
                                    <td><img src='../images/<?php echo $image_name ?>' alt='' srcset=''></td>

                               <?php }?>
                            
                          
                            <td><?php echo $rows['category_id']  ?></td>
                            <td><?php echo $rows['feature']  ?></td>
                            <td><?php echo $rows['active']  ?></td>
    
                    
                   
                    <td>
                       
                        
                        <a href="update.food.php?id=<?php echo $id."&image_name=".$image_name?>" class="btn-2">Update Food</a>
                        <a href="delete.food.php?id=<?php echo $id."&image_name=".$image_name?>" class="btn-3">Delete Food</a>
                        
                        </td>
                    </tr>
                    <?php
                  
                    }
                }else{

                    ?>
                    <tr>
                        <td colspan="8">
                            <div class='fail'>No food were added to be showed</div>
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
<?php include("partials/menu.php") ?>
<?php include("config/constrain.php") ?>

<div class="category">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br><br>

        <a class="btn-1" href="add.category.php">Add category</a>
        <br><br><br>

        <?php
        if (isset($_SESSION['add-category']))
            echo $_SESSION['add-category'] . "<br><br><br>";
        unset($_SESSION['add-category']);
        ?>
        <?php
        if (isset($_SESSION['delete-category']))
            echo $_SESSION['delete-category'] . "<br><br><br>";
        unset($_SESSION['delete-category']);
        ?>
        <?php
        if (isset($_SESSION['not-add-photo']))
            echo $_SESSION['not-add-photo'] . "<br><br><br>";
        unset($_SESSION['not-add-photo']);
        ?>
        <?php
        if (isset($_SESSION['update-category']))
            echo $_SESSION['update-category'] . "<br><br><br>";
        unset($_SESSION['update-category']);
        ?>
         <?php
        if (isset($_SESSION['not-add-photo-update']))
            echo $_SESSION['not-add-photo-update'] . "<br><br><br>";
        unset($_SESSION['not-add-photo-update']);
        ?>


        <table class="table-admin">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Active</th>
                <th>Featured</th>
                <th>image_name </th>
                <th>Image </th>
                <th>Actions </th>
            </tr>
            <?php
            $sql = "SELECT * from tbl_category";
            $res = mysqli_query($dbc, $sql);

            $count = mysqli_num_rows($res);
            $idi = 1;



            if ($res) {
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $active = $rows['active'];
                        $feauture = $rows['feauture'];
                        $image_name = $rows['image_name'];








            ?>
                        <tr>
                            <td><?php echo $idi++ ?></td>
                            <td><?php echo $title ?></td>
                            <td><?php echo $active ?></td>
                            <td><?php echo $feauture ?></td>
                           

                            

                                <?php
                                if ($image_name == ""){
                                    echo "<td ><div class='fail'>Image not added</div></td>";
                                    echo "<td ><div class='fail'>Image not added</div></td>";
                                }
                               
                                else{?>
                                    <td><?php echo $image_name ?></td>
                                    <td><img src='../images/<?php echo $image_name ?>' alt='' srcset=''></td>

                               <?php }?>
                                
                               
                                   

                                


                            


                          
                               <td>
                                <a class="btn-2" href="delete.category.php?id=<?php echo $id ?>&image_name=<?php echo $image_name ?>">Delete Categorey</a>


                                <a class="btn-3" href="update.category.php?id=<?php echo $id ?>&image_name=<?php echo $image_name ?>">Update Categorey</a>
                            </td>
                        </tr>







                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6">
                            <div class='fail'>No category were added to be showed</div>
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
<?php include 'includes/header.php';?>
<?php include 'includes/sidenav.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 

                <?php

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $catName=$_POST['catName'];
                    if(empty($catName)){
                        echo "<span class='error'>field must not be empty</span>";
                    }else{
                        $query = "INSERT INTO  tbl_category(catName) VALUES('$catName')";
                        $catinsert = $db->insert($query);
                        if($catinsert){
                           echo "<span class='sucess'>Category insert sucessfully</span>";
                        }else{
                             echo "<span class='sucess'>Category not insert</span>";
                        }
                    }
                }
                ?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'includes/footer.php';?>
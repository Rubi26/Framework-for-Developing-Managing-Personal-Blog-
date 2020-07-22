<?php include 'includes/header.php';?>
<?php include 'includes/sidenav.php';?>
<?php 
if(!isset($_GET['editcat']) || $_GET['editcat'] == NULL ){
    echo "<script>window.location = 'catlist.php';</script>";
   // header("Location:catlist.php");
}else{
    $id=$_GET['editcat'];
}

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 

                <?php

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $catName=$_POST['catName'];
                    if(empty($catName)){
                        echo "<span class='error'>field must not be empty</span>";
                    }else{
                        $query = "UPDATE tbl_category set catName='$catName' where id ='$id'";
                        $updated_row = $db->update($query);
                        if($updated_row ){
                           echo "<span class='sucess'>Category update sucessfully</span>";
                        }else{
                             echo "<span class='sucess'>Category not update</span>";
                        }
                    }
                }
                ?>
<?php 
$query = "SELECT * FROM tbl_category where id ='$id' order by id desc";
$category = $db->select($query);
while ($result=$category ->fetch_assoc()) {
?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catName'] ;?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } ?>
                </div>
            </div>
        </div>
<?php include 'includes/footer.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/sidenav.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <?php
              if($_SERVER['REQUEST_METHOD'] == 'POST'){
              $note = $post_limit->validation($_POST['note']);
      if($note == "" ){
        echo "<span class ='error'>field must not be empty</span>";
       }else{
             $query = "UPDATE tbl_footer
                                SET 
                                note  = '$note'
                                WHERE id ='1'";
                     $updated_rows = $db->update($query);
                     if($updated_rows){
                        echo "<span class ='error'>post update sucessfully</span>";
                     }else{
                        echo "<span class ='error'>post not update</span>";
                     }
        }
       
    }
   ?>
                <div class="block copyblock">
                <?php
                     $query = "SELECT * FROM tbl_footer WHERE id='1'";
                     $blog_footer = $db->select($query);
                     if ( $blog_footer) {
                         while ($result = $blog_footer->fetch_assoc() ) {
                ?> 
                 <form action="copyright.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['note'];?>" name="note" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>
                </div>
            </div>
        </div>
<?php include 'includes/footer.php';?>
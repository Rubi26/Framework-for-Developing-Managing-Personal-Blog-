﻿<?php include 'includes/header.php';?>
<?php include 'includes/sidenav.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <?php
                      if($_SERVER['REQUEST_METHOD'] == 'POST'){
                      $fb = $post_limit->validation($_POST['fb']);
                      $tw = $post_limit->validation($_POST['tw']);
                      $ln = $post_limit->validation($_POST['ln']);
                      $gp = $post_limit->validation($_POST['gp']);

                  if($fb == "" || $tw == "" || $ln == "" || $gp == "" ){
                    echo "<span class ='error'>field must not be empty</span>";
                }else{
                    $query = "UPDATE tbl_social
                                SET 
                                fb  = '$fb',
                                tw = '$tw',
                                ln = '$ln',
                                gp = '$gp'
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
                <div class="block">         
                <?php
                     $query = "SELECT * FROM tbl_social WHERE id='1'";
                     $social_media = $db->select($query);
                     if ($social_media) {
                         while ($result = $social_media->fetch_assoc() ) {
                ?>      
                 <form action="social.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $result['fb']; ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value="<?php echo $result['tw']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php echo $result['ln']; ?>"  class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value="<?php echo $result['gp']; ?>"  class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
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
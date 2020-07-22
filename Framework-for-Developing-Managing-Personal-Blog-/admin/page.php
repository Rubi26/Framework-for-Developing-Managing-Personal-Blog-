<?php include 'includes/header.php';?>
<?php include 'includes/sidenav.php';?>
<?php 
if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL ){
    echo "<script>window.location = 'index.php';</script>";
   // header("Location:catlist.php");
}else{
    $id=$_GET['pageid'];
}

?>
<style type="text/css">
    .actiondel{margin-left: 10px;}
    .actiondel a{border: 1px solid #ddd;color: #444;cursor: pointer;font-size: 19px;padding: 2px 10px;
                 font-weight: normal;background: #DDDDDD;}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2> PAGE</h2>
      <?php
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $body   = $_POST['body'];
             if($name == "" || $body == "" ){
              echo "<span class ='error'>field must not be empty</span>";
             }else{
                $query = "UPDATE tbl_page set name='$name', body='$body' where id ='$id'";
                        $updated_row = $db->update($query);
                        if($updated_row){
                           echo "<span class='sucess'>page update sucessfully</span>";
                        }else{
                             echo "<span class='sucess'>page not update</span>";
                        }
                  }
           }
       ?>
                <div class="block"> 
                             <?php
                                     $pagequery = "SELECT * FROM tbl_page WHERE id='$id' ";
                                     $pagedetails = $db->select($pagequery);
                                     if ( $pagedetails) {
                                         while ($result = $pagedetails->fetch_assoc() ) {
                             ?>              
                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name ="name" value="<?php echo $result['name'];?>" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce"  name="body">
                                    <?php echo $result['body'];?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                                <span class="actiondel"><a onclick="return confirm('Are you sure to DELETE!!');" href="deletepage.php?delpage=<?php echo $result['id']; ?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>
                </div>
            </div>
        </div>
<!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<!-- Load TinyMCE -->
<?php include 'includes/footer.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/sidenav.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New PAGE</h2>
      <?php
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $body   = $_POST['body'];
             if($name == "" || $body == "" ){
              echo "<span class ='error'>field must not be empty</span>";
             }else{
                $query = "INSERT INTO  tbl_page(name,body) VALUES('$name','$body') ";

                    $rowinsert = $db->insert($query);
                        if($rowinsert){
                           echo "page insert sucessfully";
                        }else{
                             echo "page not insert";
                        }
                  }
           }
       ?>
                <div class="block">               
                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name ="name" placeholder="Enter Page Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
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
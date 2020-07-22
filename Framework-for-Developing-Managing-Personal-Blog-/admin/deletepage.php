<?php include '../lib/session.php';
    session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/database.php';?>


<?php
$db = new database;

?>
<?php
      if(!isset($_GET['delpage']) || $_GET['delpage'] == NULL ){
          echo "<script>window.location = 'index.php';</script>";
      }else{
          $pageid=$_GET['delpage'];
    
           $delquery = "DELETE FROM tbl_page WHERE id ='$pageid' ";  
           $deldata =  $db->delete($delquery);
              if($deldata){
              	echo "<script>alert('page deleted sucessfully.')</script>";
              	echo "<script>window.location = 'index.php';</script>";
              }else{
              	echo "<script>alert('page not deleted .')</script>";
              	echo "<script>window.location = 'index.php';</script>";
              }
      }
?>

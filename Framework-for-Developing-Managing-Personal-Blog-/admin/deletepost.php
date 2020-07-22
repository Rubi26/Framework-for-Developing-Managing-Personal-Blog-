<?php include '../lib/session.php';
    session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/database.php';?>
<?php include '../helpers/format.php'; ?>

<?php
$db = new database;
$post_limit = new format;
?>
<?php
      if(!isset($_GET['deletposteid']) || $_GET['deletposteid'] == NULL ){
          echo "<script>window.location = 'postlist.php';</script>";
      }else{
          $postid=$_GET['deletposteid'];
          $query = "SELECT * FROM tbl_post WHERE id ='$postid' ";
          $getdata = $db->select($query);
             if($getdata){
             	while ($delimg = $getdata->fetch_assoc()) {
             		$dellink = $delimg['image'];
             		unlink($dellink);
             	}
             }
           $query = "DELETE FROM tbl_post WHERE id ='$postid' ";  
           $deldata =  $db->delete($query);
              if($deldata){
              	echo "<script>alert('data deleted sucessfully.')</script>";
              	echo "<script>window.location = 'postlist.php';</script>";
              }else{
              	echo "<script>alert('data not deleted .')</script>";
              	echo "<script>window.location = 'postlist.php';</script>";
              }
      }
?>

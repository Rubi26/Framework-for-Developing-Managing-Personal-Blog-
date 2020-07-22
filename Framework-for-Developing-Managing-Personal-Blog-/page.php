<?php include 'helpers/header.php';?>
<?php 
if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL ){
    // echo "<script>window.location = 'index.php';</script>";
   header("Location:404.php");
}else{
    $id=$_GET['pageid'];
}

?>

	  <?php
                                     $pagequery = "SELECT * FROM tbl_page WHERE id='$id' ";
                                     $pagedetails = $db->select($pagequery);
                                     if ( $pagedetails) {
                                         while ($result = $pagedetails->fetch_assoc() ) {
                             ?> 
                             <section id="mainbody">
<!-- all post starts here -->
	<div class="all-post">
                             <div class="about">
								<h2><?php echo $result['name'];?></h2>
								<?php echo $result['body'];?>
	       <?php } } 
             else{
             	 header("Location:404.php");
             }
	       ?>

</div>
</div>
</section>
<?php include 'helpers/sidenav.php';?>

<?php include 'helpers/footer.php';?>
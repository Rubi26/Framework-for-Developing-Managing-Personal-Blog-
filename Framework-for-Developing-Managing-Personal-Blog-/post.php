<?php include 'helpers/header.php';?>

<?php
if(!isset($_GET['id']) || $_GET['id'] == NULL){
	header("Location: 404.php");
}else{
	$id = $_GET['id'];
}
?>
<!-- main body starts -->
<section id="mainbody">
<!-- all post starts here -->
	<div class="all-post">

<?php
$myQuery = "SELECT * FROM tbl_post WHERE id = $id";
$post_read = $db->select($myQuery);
?>

<?php if($post_read){?>
	<?php while($post_result = $post_read->fetch_assoc()){?>
		<div class="all-post-parts">
			<h2><?php echo $post_result['title']?></h2>
			<ul>
				<li><a href="#"><?php echo $post_result['date']?></a></li>
				<li class="bar">|</li>
				<li><a href="#"><?php echo $post_result['author']?></a></li>
			</ul>
			<div class="post-contents">
				<div class="sample-post-image">
					<img src="admin/<?php echo $post_result['image'];?>">
				</div>
				
				<?php echo $post_result['body'];?>
				<p></p>
				<a href="index.php">Go to Home</a>
			</div>
		</div>
<!-- related post starts here -->

<div class="related_post">
	<h2>Related Articles</h2>
	<?php
		$catId = $post_result['cat'];
		$post_id = $post_result['id'];
		$myQuery = "SELECT * FROM tbl_post WHERE cat=$catId AND id!= $post_id";
		$related_post = $db->select($myQuery);

		if($related_post){
			while($related_post_result = $related_post->fetch_assoc()){
	?>
	<a href="post.php?id=<?php echo $related_post_result['id'];?>"><img src="admin/<?php echo $related_post_result['image'];?>" title=""></a>
<?php }?> <!-- end of related posts while loop -->
	<?php } else{echo "No Related articles found";}?> <!-- end of related posts if-else loop -->

</div>
<!-- related post ends here -->



<?php } ?> <!-- end of while loop -->

<?php } else{
	header("Location:404.php");
	}?> <!-- end of if else loop -->

	</div>
<!-- all post ends here	 -->
<?php include 'helpers/sidenav.php';?>
</section>
<!-- main body ends -->
<?php include 'helpers/footer.php';?>
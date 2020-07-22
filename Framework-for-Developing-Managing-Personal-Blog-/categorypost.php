<?php include 'helpers/header.php';?>
<?php include 'helpers/slider.php';?>

<?php
if(!isset($_GET['category']) || $_GET['category'] == NULL){
	header("Location: 404.php");
}else{
	$category_id = $_GET['category'];
}
?>
<!-- main body starts -->
<section id="mainbody">
<!-- all post starts here -->
	<div class="all-post">
<?php
$myQuery = "SELECT * FROM tbl_post WHERE cat = $category_id";
$post_read = $db->select($myQuery);
?>

<?php if($post_read){?>
	<?php while($post_result = $post_read->fetch_assoc()){?>
		<div class="all-post-parts">
			<h2><a href="post.php?id=<?php echo $post_result['id']?>"><?php echo $post_result['title']?></a></h2>
			<ul>
				<li><a href="#"><?php echo $post_result['date']?></a></li>
				<li class="bar">|</li>
				<li><a href="#"><?php echo $post_result['author']?></a></li>
			</ul>
			<div class="post-contents">
				<div class="sample-post-image">
					<img src="admin/<?php echo $post_result['image'];?>">
				</div>
				
				<?php echo $post_limit->textShorten($post_result['body'], 400)?>
				<p></p>
				<a href="post.php?id=<?php echo $post_result['id'];?>">Read more</a>
			</div>
		</div>

<?php } ?> <!-- end of while loop -->


<?php } else{ ?>
	<h2>No Post Found</h2>
<?php	}?> <!-- end of if else loop -->
	</div>
<!-- all post ends here	 -->
<?php include 'helpers/sidenav.php';?>
</section>
<!-- main body ends -->
<?php include 'helpers/footer.php';?>
<?php include 'helpers/header.php';?>
<?php include 'helpers/slider.php';?>



<!-- main body starts -->
<section id="mainbody">
<!-- all post starts here -->
	<div class="all-post">
<!-- pagination starts -->
<?php
$per_page = 3;
if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = 1;
}
$start_from = ($page-1)*$per_page;
?>
<!-- pagination ends -->

<?php
$myQuery = "SELECT * FROM tbl_post LIMIT $start_from,$per_page";
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


<!-- pagination starts -->
<?php
$myQuery = "SELECT * FROM tbl_post";
$result = $db->select($myQuery);
$total_rows = mysqli_num_rows($result);
$total_pages = ceil($total_rows/$per_page);

echo "<span class='pagination'><a href='index.php?page=1'>First Page</a>";

for ($i=1; $i <=$total_pages ; $i++) { 
	echo "<a href='index.php?page=$i'>$i</a>";
}

echo "<a href='index.php?page=$total_pages'>Last Page</a></span>";
?>
<!-- pagination ends -->

<?php } else{
	header("Location:404.php");
	}?> <!-- end of if else loop -->
	</div>
<!-- all post ends here	 -->
<?php include 'helpers/sidenav.php';?>
</section>
<!-- main body ends -->
<?php include 'helpers/footer.php';?>
	<div class="sidenav">
		<div class="categories">
			<h2>Categories</h2>
			<ul>
			<?php
				$myQuery = "SELECT * FROM tbl_category";
				$post_read = $db->select($myQuery);
				if($post_read){
					while ($result = $post_read->fetch_assoc()) {
			?>

				<li><a href="categorypost.php?category=<?php echo $result['id'];?>"><?php echo $result['catName'];?></a></li>
				<?php } ?> <!-- end of while -->
			<?php }else{?>
				<li>No Category Created</li>
			<?php }?> <!-- end of if else -->
			</ul>
		</div>
		<div class="latestpost">
			<h2>Latest Post</h2>

			<?php
				$myQuery = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 4";
				$post_read = $db->select($myQuery);
				if($post_read){
					while ($result = $post_read->fetch_assoc()) {
			?>
			<div class="single-latest-post">
				<h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h3>
				<div class="latest-post-image">
					<img src="admin/<?php echo $result['image'];?>">
				</div>
				<?php echo  $post_limit->textShorten($result['body'], 160)?>
			</div>
			<?php } ?> <!-- end of while -->
			<?php }else{?>
				<h3> No Latest Post</h3>
			<?php }?> <!-- end of if else -->
		</div>
	</div>
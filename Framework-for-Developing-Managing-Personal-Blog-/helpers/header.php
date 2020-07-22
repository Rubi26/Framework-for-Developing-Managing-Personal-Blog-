<?php include 'config/config.php';?>
<?php include 'lib/database.php';?>
<?php include 'helpers/format.php';?>

<?php
$db = new database;
$post_limit = new format;
?>

<!DOCTYPE html>
<html>
<head>
	<?php
      if (isset($_GET['pageid'])) {
      	$pagetitleid = $_GET['pageid'];
      $query = "SELECT * FROM tbl_page WHERE id='$pagetitleid' ";
      $pages = $db->select($query);
       if ( $pages) {
       while ($result = $pages->fetch_assoc() ) {?>

	<title><?php echo $result['name'];?>-<?php echo TITLE;?></title>

  <?php     }} } elseif(isset($_GET['id'])) {
      	$postid = $_GET['id'];
      $query = "SELECT * FROM tbl_post WHERE id='$postid' ";
      $posts = $db->select($query);
       if ( $posts) {
       while ($result = $posts->fetch_assoc() ) {?>

	<title><?php echo $result['title'];?>-<?php echo TITLE;?></title>

  <?php     }} }else {?>
  <title><?php echo $post_limit->title(); ?>-<?php echo TITLE;?></title>
<?php } ?>

	<link rel="stylesheet" type="text/css" href="inc/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">

<!-- including theme styles -->
	<link rel="stylesheet" type="text/css" href="inc/themes/bar/bar.css">
<!-- including theme styles -->
	<link rel="stylesheet" type="text/css" href="inc/nivo-slider.css">

	<link rel="stylesheet" type="text/css" href="inc/style.css">
</head>
<body>

<!--  body wrapper starts here -->
<section id="bodyWrapper">
<!-- header starts here -->
<section id="header">
	<div class="header-left">
		 <?php 
                     $query = "SELECT * FROM title_slogan WHERE id='1'";
                     $blog_title = $db->select($query);
                     if ( $blog_title) {
                       while ($result = $blog_title->fetch_assoc() ) {
                ?>
		<div class="logo">
			  
			<img src="admin/<?php echo $result['logo'];?>">
		</div>

		<div class="blogAuthor">
			<h2><?php echo $result['title'];?></h2>
			<p><?php echo $result['slogan'];?></p>
		</div>
		<?php } } ?>
	</div>

	<!-- header right starts here -->
	<div class="header-right">
		<div class="header-social-icons">
			<?php
                     $query = "SELECT * FROM tbl_social WHERE id='1'";
                     $social_media = $db->select($query);
                     if ($social_media) {
                         while ($result = $social_media->fetch_assoc() ) {
            ?>
			<ul>
				<li><a href="<?php echo $result['fb']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="<?php echo $result['tw']; ?>"><i class="fa fa-twitter"></i></a></li>
				<li><a href="<?php echo $result['ln']; ?>"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="<?php echo $result['gp']; ?>"><i class="fa fa-google-plus"></i></a></li>
			</ul>
		    <?php } } ?>
		</div>

		<div class="header-search-bar">
			<form action="searchresult.php" method="post">
				<input type="text" name="search-bar" placeholder="Search here">
				<input type="submit" name="search-button" value="Search">
			</form>
		</div>
	</div>
	<!-- header right ends here -->
</section>
<!-- header ends here -->

<!-- menu starts here -->
<section id="menu">
	<?php
       $path = $_SERVER['SCRIPT_FILENAME'];
      $currentpage = basename($path,'.php');
	?>
	<ul>
		<li><a <?php if($currentpage=='index'){echo 'id="active"';}?>
                      class="active" href="index.php">Home</a></li>
 <?php
                                     $query = "SELECT * FROM tbl_page";
                                     $pages = $db->select($query);
                                     if ( $pages) {
                                         while ($result = $pages->fetch_assoc() ) {
                                  ?> 
                                   <li><a                         	
							             <?php
							                  if(isset($_GET['pageid']) && $_GET['pageid']==$result['id']){
							                  	echo 'id="active"';
							                  }    
							             ?>
             	href="page.php?pageid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a> </li>
                              <?php }}?>
		<li><a <?php if($currentpage=='contact'){echo 'id="active"';}?> href="contact.php">Contact</a></li>
	</ul>
</section>
<!-- menu ends here -->
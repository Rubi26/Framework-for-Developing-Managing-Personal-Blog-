<?php 
include '../lib/session.php';
session::checklogin();
?>


<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include '../helpers/format.php';?>

<?php
$db = new database;
$post_limit = new format;
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
        <?php
        	if($_SERVER['REQUEST_METHOD'] == 'POST'){
        		$username = $post_limit->validation($_POST['username']);
        		$password = $post_limit->validation(md5($_POST['password']));

        		$myQuery = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
        		$read = $db->select($myQuery);

        		if($read != false){
        			$result = $read->fetch_assoc();
        			$row = mysqli_num_rows($read);

        			if($row > 0){
        				session::init();
        				session::set("login",true);
        				session::set("username",$result['username']);
        				session::set("id",$result['id']);
        				header("Location: index.php");
        			}else{
        				echo "No Data found";
        			}

        		}else{
        			echo "Username & Password didn't match";
        		}

        	}

        ?>
		<form action="login.php" method="post">

			<h1>Admin Login</h1>
			
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" name="button" />
			</div>
		</form><!-- form -->
		
		<div class="button">
			<a href="http://localhost/rubisblog/index.php">ICT_CoU Blog</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
<?php include 'helpers/header.php';?>
 <?php
        	
                if($_SERVER['REQUEST_METHOD'] == "POST"){
        		$firstname = $post_limit->validation($_POST['firstname']);
        		$lastname = $post_limit->validation($_POST['lastname']);
        		$email = $post_limit->validation($_POST['email']);
        		$body = $post_limit->validation($_POST['body']);


        		$firstname =mysqli_real_escape_string($db->link, $firstname);
        		$lastname =mysqli_real_escape_string($db->link, $lastname);
        		$email =mysqli_real_escape_string($db->link, $email);
        		$body =mysqli_real_escape_string($db->link, $body);

                 $error = "";
                 if(empty($firstname)){
                 	$error ="first name must not be empty";
                 }elseif(!filter_var($firstname, FILTER_SANITIZE_SPECIAL_CHARS)){
                 	$error ="Invaild name";
                 }elseif(empty($lastname)){
                 	$error ="last name must not be empty";
                 }elseif(empty($email)){
                    $error ="email must not be empty";
                 }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 	$error ="Invaild email address!";
                 }elseif(empty($body)){
                    $error ="message field not be empty";
                 }else{
                 	$msg ="ok";
                 }

        	}
        		?>

<div class="contentsection contemplete clear">
<div class="maincontent clear">
	<h2>Contact Us</h2>
	<?php

    if (isset($error)) {
    	echo "<span style='color:red>$error</span>";
    }if (isset($msg)) {
    	echo "<span style='color:red>$msg</span>";
    }
	?>
 <form action="" method="post">
 	<table>
 		<tr>
 			<td>Your First Name</td>
 			<td><input type="text" placeholder="Enter First Name"  name="firstname"/></td>
 		</tr>
 		<tr>
 			<td>Your Last Name</td>
 			<td><input type="text" placeholder="Enter Last Name" name="lastname"/></td>
 		</tr>
 		<tr>
 			<td>Your Email Address</td>
 			<td><input type="text" placeholder="Enter Email Address"  name="email"/></td>
 		</tr>
 		<tr>
 			<td>Your Message</td>
 			<td>
 				<textarea name="body"></textarea>
 			</td>
 		</tr>
 		<tr>
 			<td></td>
 			<td>
 				<input type="submit" name="submit" value="Send">
 			</td>
 		</tr>
 	</table>
</div>
</div>
<?php include 'helpers/sidenav.php';?>
</section>
<?php include 'helpers/footer.php';?>
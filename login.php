<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>नेपाली लगइन प्रणाली</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
		<div class="form-container">
			
			<h1>आफ्नो अकाउन्टमा लगइन गर्नुहोस्।</h1>
			
			<?php include('errors.php'); ?>

			<form action="login.php" method="POST">
				
				

				<div class="textfield">
				<input type="text" name="user" id="name" placeholder=" नाम" >	
				</div>

				<div class="textfield">
			 	<input type="password" name="pass" placeholder=" पासवर्ड" >
				</div>

				<div class="button">
				<input type="submit" name="login_user" value="लगइन">
				</div>

				<div class="othertext">
				<a href="signup.php">नयाँ सदस्य बन्ने ? </a>
				</div>

			</form>
		</div>
</body>
</html>
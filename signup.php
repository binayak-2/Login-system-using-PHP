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



		<h1>हामीसँग जोडिनुहोस </h1>

		<?php include('errors.php'); ?>

		<form action="signup.php" method="post">

		<div class="textfield">
			<input type="text" name="email"  placeholder=" ईमेल">	
		</div>

		<div class="textfield">
			<input type="text" name="user"  placeholder=" नाम">	
		</div>

		<div class="textfield">
			<input type="password" name="pass1"  placeholder=" पासवर्ड">	
		</div>

		<div class="textfield">
			<input type="password" name="pass2"  placeholder=" पुन: पासवर्ड">	
		</div>

		<div class="button">
			<input type="submit" name="reg_user" value="अर्को ">
		</div>

		<div class="othertext">
			<a href="login.php">पहिला नै सदस्य बन्नुभएको छ भने यहाँ बाट लगइन् गर्नुहोस् </a>
		</div>
		
		</form>
	</div>

</body>
</html>

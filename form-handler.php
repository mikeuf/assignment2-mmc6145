<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Mike's Used Cars</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.typekit.net/jbi4yyc.css">
<script src="https://kit.fontawesome.com/7f4ab2e017.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="container">
			<header>
			<h1><i id="logo" class="fad fa-car"></i>Mike's Used Cars</h1>
			<h2>Family-Owned and Operated Since 2020</h2>
</header>
<main>
		<?php
			$name 					= $_POST['name'];
			$password 			= $_POST['password'];
			$birthday 		= $_POST['dob'];
			$phone 					= $_POST['phone'];
			$email 					= $_POST['email'];
			$vehicleType		= $_POST['vehicle-type'];
			$color 	= $_POST['color'];
			$comments 	= $_POST['comments'];

		if ($password == "opensaysame") {
			echo "<ul id='submitted-list'>";
			echo "<h2>Form Submitted</h2>";
			echo "<p>We will be contacting you soon.</p>";

			if (!empty($name)) {
				echo "<li><span class='label'>Name:</span> $name</li>";
			}

			if (!empty($email)) {
				echo "<li><span class='label'>Email:</span> <a href='mailto:$email'>$email</a></li>";
			}

			if (!empty($phone)) {
				echo "<li><span class='label'>Phone:</span> <a href='tel:$phone'>$phone</a></li>";
			}
			
			if (!empty($birthday)) {
				$birthday = strtotime($birthday);
				$todaysDate = date();
				
				$birthday = date("F d, Y", $birthday);
				echo "<li><span class='label'>Today's Date:</span> $birthday</li>";

				/* Check to see if it's the users birthday */
				if ($todaysDate == $birthday) {
				echo "<li><p class='txt-alert'>Happy Birthday, $name!</p></li>";
				}
			}

			if (!empty($vehicleType)){
				echo "<li><span class='label'>Vehicle Type:</span> $vehicleType</li>";
				if ($vehicleType == 'Sedan') {
					echo "<li><span class='label'>How responsible! A sedan a very sensible purchase.</span></li>";
				} else if ($vehicleType == 'Truck') {
					echo "<li><span class='label'>Excellent! Can I borrow your truck for my upcoming move?</span></li>";
				} else if ($vehicleType == 'SUV') {
					echo "<li><span class='label'>How exciting! Don't worry, I'm sure the price of oil will stay low for your new SUV.</span></li>";
				} else {
					echo "<li><span class='label'>Hmmm... looks like we didn't understand which vehicle you picked. Try again!</span></li>";
				}
			}

			if (!empty($color)){
				echo "<li><span class='label'>Color:</span> $color</li>";
				if ($color == 'Minty Green') {
					echo "<li><span class='label'>I'm sure your minty green car will smell as fresh as it looks!</span></li>";
				} else if ($color == 'Darth Vader Black') {
					echo "<li><span class='label'>It will be as you command, my master.</span></li>";
				} else if ($color == 'Night King Blue') {
					echo "<li><span class='label'>You nothing, Jon Snow. But, when people see you in your Night King Blue vehicle, they'll feel like winter is always coming.</span></li>";
				} else {
					echo "<li><span class='label'>'Hmmm... looks like we didn't understand which color you picked. Try again!'</span></li>";
				}
			}

			if (!empty($comments)){
				echo "<li><span class='label'>Comments:</span> $comments</li>";
			}
			echo "</ul>";

			} else {
				echo "<h2>Sorry! That password doesn't match our records.</h2>";
			}
				echo "<button id='btn-back' onclick='history.go(-1);'>Back</button>";
			?>
		</main>
	</body>
</html>

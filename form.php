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
			<form id="customer-form" method="post" action="form-handler.php">
				<fieldset>
					<legend>Your Information</legend>

			<p>Please complete the form below. Our sales staff will contact you to discuss how to help you choose from our glorious selection of pre-owned vehicles.</p>
					<ul id="customer-form-list">
						<li class="customer-form-list-item">
							<label for="name">Name:</label>
							<input type="text" id="name" name="name">
						</li>

							<li class="customer-form-list-item">
								<label for="password">Password:</label>
								<input type="password" id="password" name="password" >
							</li>

						<li class="customer-form-list-item">
							<label for="dob">Date of Birth:</label>
							<input type="date" id="dob" name="dob">
						</li>

						<li class="customer-form-list-item">
							<label for="email">Email:</label>
							<input type="email" id="email" name="email">
						</li>

						<li class="customer-form-list-item">
							<label for="phone">Phone:</label>
							<input type="tel" id="phone" name="phone">
						</li>
						<li class="customer-form-list-item">

							<label for="vehicle-type">Vehicle Type:</label>
						<ul id="customer-form-list-sub">	
							
						<li class="customer-form-list-item">
	<input type="radio" id="vehicle-type-sedan" name="vehicle-type" value="Sedan">
	
							<label for="vehicle-type-sedan">Sedan</label>
</li>

						<li class="customer-form-list-item">
	<input type="radio" id="vehicle-type-truck" name="vehicle-type" value="Truck">
	
							<label for="vehicle-type-truck">Truck</label>
</li>


						<li class="customer-form-list-item">

	<input type="radio" id="vehicle-type-suv" name="vehicle-type" value="SUV">
	
							<label for="vehicle-type-suv">SUV</label>
</li>
</ul>
</li>

	<li class="customer-form-list-item">
  <label for="color">Choose a Paint Color:</label>
  <select id="color" name="color" size="1">
    <option value="Minty Green">Minty Green</option>
    <option value="Darth Vader Black">Darth Vader Black</option>
    <option value="Night King Blue">Night King Blue</option>
  </select>
  </li>

<li class="customer-form-list-item">
							<label for="comments">Questions or Comments:</label>
	<textarea name="comments" rows="20" cols="40"></textarea>
</li>

					</ul>
				</fieldset>

				<input id="btn-submit" type="submit" value="Submit" >
			</form>

</main>
</div>
	</body>
</html>

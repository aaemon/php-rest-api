<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Carnival</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="container w-25">
			<h1 class="text-center m-5">Register</h1>
			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" name="firstname" class="form-control" id="firstname">
			</div>
			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" name="lastname" class="form-control" id="lastname">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control" id="email">
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" class="form-control" id="address">
			</div>
			<div class="form-group">
				<label for="mobile">Mobile</label>
				<input type="number" name="mobile" class="form-control" id="mobile">
			</div>
			<div class="form-group">
				<label for="package">Package</label>
				<input type="number" name="package" class="form-control" id="package">
			</div>
			<div class="form-group">
				<label for="carnivalid">Carnival ID</label>
				<input type="number" name="carnivalid" class="form-control" id="carnivalid">
			</div>

			<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
	
	<?php
		if(isset($_POST['submit'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$mobile = $_POST['mobile'];
			$package = $_POST['package'];
			$carnivalid = $_POST['carnivalid'];

			include('server.php');

			$sql = "INSERT INTO usertable (firstname, lastname, email, address, mobile, package, carnivalid) VALUES ('$firstname', '$lastname', '$email', '$address', '$mobile', '$package', '$carnivalid')";
			if(mysqli_query($conn, $sql)){
				echo "Records inserted successfully.";
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

			// Close connection
			mysqli_close($conn);
		}

		
	?>
</body>
</html>
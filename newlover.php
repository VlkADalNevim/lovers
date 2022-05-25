<?php
    require_once "loggedincheck.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>New lover</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script src="https://kit.fontawesome.com/9526c175c2.js" crossorigin="anonymous"></script>
		
		<style>

                table{
					width: 100%;
					border-collapse: collapse;
				}
				tr {
					border-bottom: 1px solid #e0e0e3;
					
				}
				td {
					text-align: left;
					padding: 20px;
					
				}
				tr:hover {
					background: #dadada;
				}

		</style>

	</head>

	<body class="loggedin">
		<nav class="navtop">
			<div>
				<a href="home.php"><i class="fa-solid fa-house-chimney"></i>Lovers++</a>
				<h1></h1>
				<a href="meeting.php"><i class="fa-solid fa-calendar"></i>Meeting</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>

			</div>
		</nav>
		<div class="content">
			<h2>Add lover:</h2>

                <div>
                    <table>
						<form method="post" action="#">
							<div class="form-group">
								<tr>
									<td>Username:</td>
									<td><input type="text" class="addloverform" name="username" required></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td>Firstname:</td>
									<td><input type="text" class="addloverform" name="firstname" required></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td>Lastname:</td>
									<td><input type="text" class="addloverform" name="lastname" required></td>
								</tr>
							</div>
                            <div class="form-group">
								<tr>
									<td>Email:</td>
									<td><input type="email" class="addloverform" name="email" required></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td>Age:</td>
									<td><input type="number" class="addloverform" name="age" required></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td>Gender:</td>
									<td><input type="text" class="addloverform" name="gender" required></td>
								</tr>
							</div>
                            
							<div>
								<input type="submit" name="submit" class="btnbtn-primary" style="width:20em; margin:0;" value="Add lover"><br><br>
							</div>
						</form>
				    </table>
                </div>
		</div>
	</body>
</html>


<?php
if(isset($_POST['submit']))
{	 
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
	$email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

	$sql = "INSERT INTO accounts (username,firstname,lastname,email,age,gender)
	VALUES ('$id','$firstname','$lastname','$email', '$age', '$gender')";
	if (mysqli_query($con, $sql)) {
		echo "New lover added!";
	} else {
		echo "Error: " . $sql . " " . mysqli_error($con);
	}
	?>
	<script type="text/javascript">
		window.location = "meeting.php";
	</script>
	<?php
}
?>


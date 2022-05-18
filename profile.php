<?php
require_once 'loggedincheck.php'; 

$stmt = $con->prepare('SELECT password FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password);
$stmt->fetch();
$stmt->close();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script src="https://kit.fontawesome.com/9526c175c2.js" crossorigin="anonymous"></script>
		<style>
			table{
					width: 100%;
					border-collapse: collapse;
				}
				tr {

					border-top: 1px solid #e0e0e3;
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

	<?php
		$id=$_SESSION['id'];
		$query=mysqli_query($con,"SELECT * FROM accounts where id='$id'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);
	?>
	
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<a href="home.php"><i class="fa-solid fa-house-chimney"></i>Lovers++</a>
				<h1> </h1>
				<a href="meeting.php"><i class="fa-solid fa-calendar"></i>Meeting</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				
			</div>
		</nav>
		<div class="content">
			<h2>Your profile:</h2>
			<div>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
						<form method="post" action="#">
							<div class="form-group">
								<tr>
									<td>Email:</td>
									<td><input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>"/></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td>Firstname:</td>
									<td><input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>"/></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td>Lastname:</td>
									<td><input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>"/></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td>Age:</td>
									<td><input type="number" class="form-control" name="age" value="<?php echo $row['age']; ?>"/></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td>Gender:</td>
									<td><input type="text" class="form-control" name="gender" value="<?php echo $row['gender']; ?>"/></td>
								</tr>
							</div>
							<div>
								<input type="submit" name="submit" class="btnbtn-primary" style="width:20em; margin:0;" value="Save changes"><br><br>
							</div>
						</form>
				</table>
			</div>
		</div>
	</body>
</html>
<?php
    if (isset($_POST['submit'])){
    	$email = $_POST['email'];
		$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        $query = "UPDATE accounts SET email = '$email', firstname = '$firstname', lastname = '$lastname', age = '$age', gender = '$gender' WHERE id = '$id'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        ?>
    	<script type="text/javascript">
        	alert("Update Successfull.");
        	window.location = "profile.php";
    	</script>
    <?php
    }              
?>


<?php
    require_once "loggedincheck.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script src="https://kit.fontawesome.com/9526c175c2.js" crossorigin="anonymous"></script>
		
		<style>
			table{
				width: 100%;
				margin: 30px auto;
				border-collapse: collapse;
				text-align: center;
			}
			tr {
				border-bottom: 1px solid #cbcbcb;
			}
			th{
				border: none;
				height: 30px;
				padding: 10px;
				font-size: 24px;
			}
			td{
				border: none;
				height: 30px;
				padding: 10px;
				font-size: 19px;
			}
			tr:hover {
				background: #F5F5F5;
			}
		</style>

	</head>

	<?php
		$id=$_SESSION['id'];
		$query=mysqli_query($con,"SELECT * FROM accounts where not id=$id")or die(mysqli_error());
	?>

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
			<h2>Home:</h2>

			<a class="addlover" href="newlover.php">Add Lover <i class="fa-solid fa-plus"></i></a>

			<table>
				<thead>
					<tr>
						<th>Fristname</th>
						<th>Lastname</th>
						<th>Age</th>
						<th>Gender</th>
						<th></th>
					</tr>
				</thead>
				
				<?php while ($row = mysqli_fetch_array($query)) { ?>
					<tr>
						<form method="post" action="#">
							<td><?php echo $row['firstname']; ?><input type="hidden" name="firstname" value="<?php echo $row['firstname']; ?>"/></td>
							<td><?php echo $row['lastname']; ?><input type="hidden" name="lastname" value="<?php echo $row['lastname']; ?>"/></td>
							<td><?php echo $row['age']; ?></td>
							<td><?php echo $row['gender']; ?></td>
							<td><input type="submit" name="meet" value="Meet Me!" class="meet_btn"></td>
						</form>
					</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>


<?php
if(isset($_POST['meet']))
{	 
	$mfirstname = $_POST['firstname'];
	$mlastname = $_POST['lastname'];

	$sql = "INSERT INTO meeting (accounts_ID,mfirstname,mlastname,mdate,mtime,place)
	VALUES ('$id','$mfirstname','$mlastname','0000-00-00', '00:00:00', '')";
	if (mysqli_query($con, $sql)) {
		echo "New meeting created!";
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



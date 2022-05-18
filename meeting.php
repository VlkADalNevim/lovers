<?php
require_once 'loggedincheck.php'; 
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
                border-collapse: collapse;
			}
			tr {

                border-top: 1px solid #e0e0e3;
                border-bottom: 1px solid #e0e0e3;
                
			}
            th {
				text-align: center;
                padding: 20px;
                
			}
            td {
				text-align: center;
                padding: 20px;
                
			}
            tr:hover {
				background: #f0f0f0;
			}
		</style>

	</head>

	<?php 
		$id=$_SESSION['id'];
		$query=mysqli_query($con, "SELECT * FROM meeting WHERE accounts_ID=$id")or die(mysqli_error());
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

        	<h2>Your meetings:</h2>

            <table>
                <thead>
					<tr>
						<th>#</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Date</th>
						<th>Time</th>
						<th>Place</th>
						<th></th>
						<th></th>
					</tr>
				</thead>

                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                        <tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['mfirstname']; ?></td>
								<td><?php echo $row['mlastname']; ?></td>

								<form method="post" action="#" >

										<td><input type="date" class="meetinginput" name="mdate" value="<?php echo $row['mdate']; ?>"/></td>
										<td><input type="time" class="meetinginput" name="mtime" value="<?php echo $row['mtime']; ?>"/></td>
										<td><input type="text" class="meetinginput" name="place" value="<?php echo $row['place']; ?>"/></td>


										<td><input type="submit" name="update" value="Update" class="update_btn"><input type="hidden" name="id" value="<?php echo $row['id']; ?>"/></td>
										<td><a href="meeting.php?del=<?php echo $row['id']; ?>" class="del_btn"><i class="fa-solid fa-trash"></i></a></td>

								</form>
                        	</tr>
                    <?php } ?>
                </table>
		</div>
	</body>
</html>

<?php
	if (isset($_GET['del'])) {
		$id = $_GET['del'];

		mysqli_query($con, "DELETE FROM meeting WHERE id=$id");
		?>
		<script type="text/javascript">
			window.location = "meeting.php";
		</script>
		<?php
	}              
?>

<?php
if(isset($_POST['update']))
{	 
	$id = $_POST['id'];
	$mdate = $_POST['mdate'];
	$mtime = $_POST['mtime'];
	$place = $_POST['place'];

	$sql = "UPDATE meeting SET mdate='$mdate', mtime='$mtime', place='$place' where id='$id'";
	if (mysqli_query($con, $sql)) {
		echo "Meeting updated!";
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

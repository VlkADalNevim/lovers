<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'sql106.epizy.com';
$DATABASE_USER = 'epiz_31545781';
$DATABASE_PASS = 'Z7RvVFGykf';
$DATABASE_NAME = 'epiz_31545781_phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
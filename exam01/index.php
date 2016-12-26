<?php
session_start();
require("dbconnect.php");
if (! isset($_SESSION["id"]))
	$_SESSION["uID"] = 0;
	
if ($_SESSION["uID"] <= 0) {
	//header("Location: login.php");
	echo "Please Login. <a href='gameview.php'>Login</a>";
	exit(0);
}
?>
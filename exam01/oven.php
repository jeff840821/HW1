<?php
require("dbconnect.php");

function getOvenData() {
	global $conn;
	$sql = "select * from oven;";
	return mysqli_query($conn,$sql);
}

?>
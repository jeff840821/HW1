<?php
require("dbconnect.php");

function getResorse() {
	global $conn;
	$sql = "select * from user;";
	return mysqli_query($conn,$sql);
}

function addRE($B_flower,$B_milk,$B_money) {
	global $conn;
	$Tsql = "select * from user;";
	$Tresult = mysqli_query($conn,$Tsql);
	if ($Tresult) {
			while (	$Trs=mysqli_fetch_assoc($Tresult)) {
				$Tflower = $Trs['Flower'];
				$Tmilk = $Trs['Milk'];
			}
	}
	$B_flower=$Tflower + mysqli_real_escape_string($conn,$B_flower);
	$B_milk=$Tmilk + mysqli_real_escape_string($conn,$B_milk);
	$B_money = mysqli_real_escape_string($conn,$B_money);
	if ($B_money) {
		$sql = "UPDATE user SET Flower = $B_flower , Milk = $B_milk , Money = $B_money;";
		return mysqli_query($conn, $sql);
	} else {
		return false;
	}
}

?>
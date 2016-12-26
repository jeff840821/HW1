<?php
session_start();
require("resourse.php");
if(! isset($_POST["act"])) {
	exit(0);
}

$act =$_POST["act"];
switch($act) {
	case "addre":
		global $conn;
		$sql = "select * from user;";
		$result = mysqli_query($conn,$sql);
		if ($result) {
			while (	$rs=mysqli_fetch_assoc($result)) {
				$B_money = $rs['Money'];
			}
		}
		
		$B_flower=$_POST['Bflower'];
		$B_milk=$_POST['Bmilk'];
		$tmp = rand(20,50);
		$B_money = $B_money - ($B_flower * $tmp);
		$tmp = rand(50,70);
		$B_money = $B_money - ($B_milk * $tmp);

		if ($B_money >= 0) {
			if (addRE($B_flower,$B_milk,$B_money)) {
				echo( "OK");
				
			} else {
				echo( "You don't have enough money");
				
			}
		} else {
			echo "You don't have enough money";
		}
		header("Location: gameview.php");
		break;
	default:
}
?>

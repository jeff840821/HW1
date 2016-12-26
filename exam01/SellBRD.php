<?php
	session_start();
	require("dbconnect.php");

	$OVID=(int)$_REQUEST['id'];
			
	global $conn;
	$OVsql = "select * from oven;";
	$OVresult = mysqli_query($conn,$OVsql);

	if ($OVresult) {
		while (	$OVrs=mysqli_fetch_assoc($OVresult)) {
			if ($OVrs['OID'] == $OVID)
			{
				$OVB = $OVrs['OvenBRD'];
			}
		}
	}
			
	global $conn;
	$BRDsql = "select * from bom;";
	$BRDresult = mysqli_query($conn,$BRDsql);

	if ($BRDresult) {
		while (	$BRDrs=mysqli_fetch_assoc($BRDresult)) {
			if ($BRDrs['BID'] == $OVB)
			{
				$BRD_money = $BRDrs['BomMoney'];
			}
		}
	}

	global $conn;
	$Bsql = "select * from user;";
	$Bresult = mysqli_query($conn,$Bsql);

	if ($Bresult) {
		while (	$Brs=mysqli_fetch_assoc($Bresult)) {
			$B_money = $Brs['Money'];
		}
	}
			
	if ($OVID) {
		$sql = "UPDATE oven SET Complete = 0 , OvenBRD = -1  , OTime = -1 WHERE OID = $OVID";
		mysqli_query($conn,$sql) or die("MySQL query error");
		$B_money = $B_money + $BRD_money + rand(0,200);
		$Ssql = "UPDATE user SET Money = $B_money";
		mysqli_query($conn,$Ssql) or die("MySQL query error");
		echo "完成!<br>";
	}
	else {
		echo "沒有成功!<br>";
	}
	header("Location: gameview.php");
?>

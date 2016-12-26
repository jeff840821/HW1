

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>

html, body {
    margin:0px;
}

body {
	font-family:Microsoft JhengHei;
	font-weight:bold;
}

button {
	font-family:Microsoft JhengHei;
	border-radius: 12px;
	weight: 120px;
	height: 100%;
	font-size: 40px;
	margin: 0;
	padding: 0;
	border: none;
	text-align: center;
	background-color: #FFD9AA;
	color: #D4A66A;
	font-weight:bold;
}

table {
	border: none;
	font-size: 40px;
	color: #D4A66A;
	width : 100%;
	text-align: center;
}

a {
	text-decoration: none;
	color: #D4A66A;
}

a:visited {
	text-decoration: none;
    color: #D4A66A;
}
a:hover {
	background-color: #AA7839;
    color: white;
	transition: color 1s ,background-color 1s;
}


button:hover {
    background-color: #AA7839;
    color: white;
	transition: color 1s ,background-color 1s;
}

.backG {
	position: relative;
	top: 60px;
	left: 20%;
	width: 800px;
	height: 500px;
	background-color: #805115;
	border-radius: 12px;
}

.sourse {
	color: #D4A66A;
	position: absolute;
	top: 0px;
	right: 0px;
	width: 100%;
	height: 50px;
	background-color: #FFD9AA;
	border-radius: 12px;
	font-size: 40px;
	text-align: right;
}

.factory {
	position: absolute;
	top: 55px;
	left: 0px;
	width: 100%;
	height: 400px;
	background-color: #AA7839;
	border-radius: 12px;
}

</style>

</head>

<body>

<div class = "backG">
	<div class = "sourse">

	</div>
	
	<div class = "factory">
		<table>
			<?php
				session_start();
				require("dbconnect.php");

				$BBID=(int)$_REQUEST['Bid'];
				$OVID=$_SESSION['Oid'];
				$Hour = date('H');
				$Min = date('i');
				$Sec = date('s');
				
				global $conn;
				$BRDsql = "select * from bom;";
				$BRDresult = mysqli_query($conn,$BRDsql);

				if ($BRDresult) {
					while (	$BRDrs=mysqli_fetch_assoc($BRDresult)) {
						if ($BRDrs['BID'] == $BBID)
						{
							$BRD_flower = $BRDrs['BomFlower'];
							$BRD_milk = $BRDrs['BomMilk'];
							$BRD_time = $BRDrs['BomTime'];
						}
					}
				}
				
				$comTime = (((($Hour + 8) * 60) + $Min) * 60) + $Sec + $BRD_time;
				if($comTime >= 86400)
					$comTime = $comTime - 86400;
				
				global $conn;
				$Bsql = "select * from user;";
				$Bresult = mysqli_query($conn,$Bsql);

				if ($Bresult) {
					while (	$Brs=mysqli_fetch_assoc($Bresult)) {
						$B_flower = $Brs['Flower'];
						$B_milk = $Brs['Milk'];
					}
				}
				
				if(($BRD_flower <= $B_flower) && ($BRD_milk <= $B_milk)) {
					$B_flower = $B_flower - $BRD_flower;
					$B_milk = $B_milk - $BRD_milk;
					$Ssql = "UPDATE user SET Flower = $B_flower , Milk = $B_milk";
					mysqli_query($conn,$Ssql) or die("MySQL query error");
					$O_Ssql = "UPDATE oven SET OvenBRD = $BBID , OTime = $comTime WHERE OID = $OVID";
					mysqli_query($conn,$O_Ssql) or die("MySQL query error");
					header("Location: gameview.php");
				}
				else {
					echo "<tr><td>沒有足夠材料!</td></tr>";
				}		
			?>
			<tr><td><a href="gameview.php" >確認</a></td></tr>
		</table>
	</div>
</div>

</body>

</html>

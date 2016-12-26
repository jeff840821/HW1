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

			$OVID=(int)$_REQUEST['id'];

			global $conn;
			$Bsql = "select * from user;";
			$Bresult = mysqli_query($conn,$Bsql);

			if ($Bresult) {
				while (	$Brs=mysqli_fetch_assoc($Bresult)) {
					$B_money = $Brs['Money'];
				}
			}

			if ($OVID && $B_money >= 5000) {
				$sql = "UPDATE oven SET Useable = 1 WHERE OID = $OVID;";
				mysqli_query($conn,$sql) or die("MySQL query error");
				$B_money = $B_money - 5000;
				$Ssql = "UPDATE user SET Money = $B_money";
				mysqli_query($conn,$Ssql) or die("MySQL query error");
				echo "<tr><td>購買完成!</td></tr>";
			}
			else {
				echo "<tr><td>沒有足夠的金錢!</td></tr>";
			}
			?>

			<tr><td><a href="gameview.php" >確認</a></td></tr>
		</table>
	</div>
</div>

</body>

</html>
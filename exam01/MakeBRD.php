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

table {
	border: none;
	font-size: 30px;
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
	text-align: center;
}

.factory {
	position: absolute;
	top: 55px;
	left: 0px;
	width: 100%;
	height: 400px;
	background-color: #AA7839;
	border-radius: 12px;
	font-size: 40px;
	text-align: center;
	color: #D4A66A;
}

</style>

</head>

<body>

<div class = "backG">
	<div class = "sourse">
	製作麵包
	</div>
	
	<div class = "factory">
	<table>
		<tr><td>名稱</td>
		<td>所需麵粉</td>
		<td>所需牛奶</td>
		<td>最低價格</td>
		<td> </td></tr>
		<?php
		session_start();
		require("dbconnect.php");
		$_SESSION ['Oid']=(int)$_REQUEST['id'];
			
		global $conn;
		$BRDsql = "select * from bom;";
		$BRDresult = mysqli_query($conn,$BRDsql);

		if ($BRDresult) {
			while (	$BRDrs=mysqli_fetch_assoc($BRDresult)) {
				echo "<tr><td>" . $BRDrs['BomName'] . "</td>";
				echo "<td>" . $BRDrs['BomFlower'] . "</td>";
				echo "<td>" . $BRDrs['BomMilk'] . "</td>";
				echo "<td>" . $BRDrs['BomMoney'] . "</td>";
				echo "<td><a href='MakeB.php?Bid=" . $BRDrs['BID'] . "' onclick='return confirm(\"消耗材料製作?\");'>製作</a></td></tr>";
			}
		}
		?>
		
		<tr><td><a href="gameview.php" >返回</a></td></tr>
	</table>
	</div>
</div>

</body>

</html>
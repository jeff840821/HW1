<?php
session_start();
require("resourse.php");
$result=getResorse();
require("oven.php");
$Oresult=getOvenData();
?>

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
		<?php
		if ($result) {
			while (	$rs=mysqli_fetch_assoc($result)) {
				echo "金錢:" .$rs['Money'] . "  麵粉:".$rs['Flower'] ."  牛奶:".$rs['Milk'] ;
			}
		} else {
			echo "No data found!";
		}
		?>
		<button onclick="location.href='addresourse.php'">補充資源</button>
	</div>
	
	<div class = "factory">
		<table>
		<?php
		$arr=array();
		$END_time = array();

		$arr[0] = 1;
		$arr[1] = 2;
		$arr[2] = 3;
		$arr[3] = 4;
		$n = 1;
		if($Oresult) {
			while (	$Ors=mysqli_fetch_assoc($Oresult)) {
				$END_time[$n-1] = $Ors['OTime'];
				if($Ors['Useable'] == 1) {
					if($Ors['OvenBRD'] == -1)
						echo "<tr><td><a href='MakeBRD.php?id=" . $Ors['OID'] . "'>空閒中</a></td></tr>";
					else {
						echo "<tr><td id = 'timer$n'></td></tr>";
						echo "<tr><td><a id = 'comp$n' href='SellBRD.php?id=" . $Ors['OID'] . "' onclick='return confirm(\"販售?\");'></a></td></tr>";
					}
				}
				else {
					echo "<tr><td><a href='ByeOven.php?id=" . $Ors['OID'] . "' onclick='return confirm(\"花費5000購買機器嗎?\");'>購買機器</a></td></tr>";
				}
				$n++;
			}
		}
		?>
		</table>
	</div>
</div>
<script>
	window.onload = function() {
		<?php for ($i = 0;$i < sizeof( $arr );$i++){?>
			setInterval(
				function(){
					var Tday = new Date();
					var comp = document.getElementById('comp<?php echo $arr[$i];?>');
					var timer =  document.getElementById('timer<?php echo $arr[$i];?>');
					var Ending = <?php echo $END_time[$i]?>;
					var check = 0;
					if(Ending != -1) {
						var Nowing = ((Tday.getHours()*60 + Tday.getMinutes())*60 + Tday.getSeconds());
						var i = Ending - Nowing;
						if(i < 0){
							timer.innerHTML ="";
							comp.innerHTML = "完成";
						}
						else if(i == 0){
							timer.innerHTML ="";
							comp.innerHTML = "完成";
						}
						else
							timer.innerHTML = i.toString() + "秒";
					}
			},10);
		<?php }?>
	}
</script>
</body>

</html>
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
	補充資源
	</div>
	
	<div class = "factory">
		<form method="post" action="controller.php">
			<input type="hidden" name="act" value="addre">
			麵粉: <input name="Bflower" type="text" id="Bflower" value = "0" /> <br>
			牛奶: <input name="Bmilk" type="text" id="Bmilk" value = "0" /> <br>
			<input type="submit" name="Submit" value="補充" />
		</form>
	</div>
</div>

</body>

</html>
<html>
<head>
<title>monipay.fr</title>
<style>
	.ip {
		margin-left: auto;
		margin-right: auto;
		width: 600px;
		text-align: center;
		font-size: 100px;
	}
	.reverse {
		margin-left: auto;
		margin-right: auto;
		width: 600px;
		text-align: center;
		font-size: 30px;
	}
</style>
</head>
<body>
<div class="ip"><? echo $_SERVER["REMOTE_ADDR"]; ?></div>
<div class="reverse"><? echo gethostbyaddr($_SERVER["REMOTE_ADDR"]); ?></div>
</body>
</html>

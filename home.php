<?php
 session_start();
?>
<html>
<head>
<title>Medical Product Tracker</title>

<link type="image/ico" href="http://www.ti.bfh.ch/fileadmin/templates/img/favicon.ico?xyz=123456" rel="icon">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="logo"> 
				<img class="headerlogo" src="img/bfh.png" name="bfh-logo" height="70px" />
			</div>	
			<div id='headertitle'>
				<h1>Medical Product Tracker</h1>
			</div>	
		</div>
	
		<div id="content">
			<div id="sidebar">
				<form class="sidebar">
				<input type="text" style="float: center;" name="searchtext" id="searchtext" class="inputtext" placeholder="GTIN"><br>
				<input type="submit" class="searchButton" value="Search">
				</form>
				<input type="submit" style="position: absolute;bottom: 0;" class="sidebarButton" value="Logout">
			</div>   
	
	
			<div id="main">
			</div>
		</div>
		<div id="footer">	
		<p>&copy 2014 Bern University of Applied Sciences: J. Gn&aumlgi, P. Hirschi, P. Zehnder</p>
		</div>	
	</div>
</body>
</html>
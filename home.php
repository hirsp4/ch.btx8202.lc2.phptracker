<?php
 session_start();
?>
<html>
<head>
<title>Medical Product Tracker</title>

<link type="image/ico" href="http://www.ti.bfh.ch/fileadmin/templates/img/favicon.ico?xyz=123456" rel="icon">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/sidebar.js"></script>
</head>
<body>
	<div id="wrapper">
		<!-- header -->
		<div id="header">
			<div id="logo"> 
				<!-- Set the Bern University of Applied Sciences icon on top -->
				<img class="headerlogo" src="img/bfh.png" name="bfh-logo" height="90px" />
			</div>	
			<div id='headertitle'>
				<h1>Medical Product Tracker</h1>
			</div>
			<div id="loggedIn">
				<img class="headerlogo" src="img/user.png" style="vertical-align:middle;" name="user"/>  <label id="loginLabel">Logged in as: <?echo $_SESSION['username'];?></label>
			</div>	
		</div>
		<!-- content -->
		<div id="content">
			<!-- sidebar with textinput to search for GTIN -->
			<div id="sidebar">
				<div id="searchbar">
				<form class="sidebar">
				<label>Search for:   </label>
				<br><br>
				<div id="radios">
				<label>   </label><input type="radio" id="gtinradio" name="Code" value="GTIN" onClick="updateInput()"><label for="gtinradio">GTIN</label>
				<input type="radio" id="ssccradio" name="Code" value="SSCC" id="sscc" onClick="updateInput()" checked><label for="sscc">SSCC</label>
				</div>
				<br><br>
				<input type="text" style="float: center;" name="searchtext" id="ssccsearch" class="inputtext" placeholder="SSCC"><br>
				<input type="text" style="float: center;display:none;" name="serialsearch" id="serialsearch" class="inputtext" placeholder="Serial"><br>
				</div>
				<input type="submit" class="searchButton" value="Search">
				</form>
				<form action="logout.php">
				<input type="submit" style="position: absolute;bottom: 0;" class="sidebarButton" value="Logout">
				</form>
			</div>   
	
	
			<div id="main">
				<table class="trackingtable">
  <tr>
    <td class="tg-031e">Timestamp</td>
    <td class="tg-031e">GLN</td>
    <td class="tg-031e">Scanning Location</td>
    <td class="tg-031e">GTIN</td>
    <td class="tg-031e">SSCC</td>
    <td class="tg-031e">GLN destination</td>
    <td class="tg-031e">Destination Name</td>
  </tr>
  <tr>
    <td class="tg-031e">Mo, 03.11.2014 14:23:33</td>
    <td class="tg-031e">2341341212</td>
    <td class="tg-031e">Roche</td>
    <td class="tg-031e">134120310231</td>
    <td class="tg-031e">19312301203</td>
    <td class="tg-031e">1023012319393</td>
    <td class="tg-031e">Klinik Höheweg</td>
  </tr>
  <tr>
    <td class="tg-031e">Di, 04.11.2014 07:28:55</td>
    <td class="tg-031e">1023012319393</td>
    <td class="tg-031e">Klinik Höheweg</td>
    <td class="tg-031e">134120310231</td>
    <td class="tg-031e">19312301203</td>
    <td class="tg-031e">processed</td>
    <td class="tg-031e"></td>
  </tr>
</table>
				<input type="submit" style="position: absolute;bottom: 0;right: 0;" class="refreshButton" value="Refresh">
			</div>
		</div>
		<div id="footer">	
		<p>&copy 2014 Bern University of Applied Sciences: J. Gn&aumlgi, P. Hirschi, P. Zehnder</p>
		</div>	
	</div>
</body>
</html>
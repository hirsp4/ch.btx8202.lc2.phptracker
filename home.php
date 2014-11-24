<?php
/* home.php 
 *
 * This file generates the basic html structure of the Medical Product Tracker.  The goal is to let the user search by GTIN/Serial or SSCC
 * to follow his ordered product at anytime.
 *
 *
 * @author Patrick Hirschi <patrick.hirschi@students.bfh.ch>
 * @version 1.0
 * @date 24-11-2014
 *
 * Copyright (c) 2014 Berner Fachhochschule. All rights reserved.
 */

 // start the session
 session_start();
?>
<html>
<head>
<title>Medical Product Tracker</title>

<link type="image/ico" href="http://www.ti.bfh.ch/fileadmin/templates/img/favicon.ico?xyz=123456" rel="icon">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/tracktable.js"></script>
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
				<img class="headerlogo" src="img/user.png" style="vertical-align:middle;" name="user"/>  <label id="loginLabel">Logged in as: <?				echo $_SESSION['username'];?></label>
			</div>	
		</div>
		<!-- content -->
		<div id="content">
			<!-- sidebar with textinput to search for GTIN/Serial or SSCC -->
			<div id="sidebar">
				<div id="searchbar">
				<form class="sidebar">
				<br>
				<label>Search for:   </label>
				<br><br>
				<div id="radios">
				<label>   </label><input type="radio" id="gtinradio" name="Code" value="GTIN" onClick="updateInput()" checked><label 		for="gtinradio">GTIN</label>
				<input type="radio" id="ssccradio" name="Code" value="SSCC" id="sscc" onClick="updateInput()"><label for="sscc">SSCC</label>
				</div>
				<br><br>
				<input type="text" style="float: center;" name="searchtext" id="ssccsearch" class="inputtext" placeholder="GTIN"><br>
				<input type="text" style="float: center;" name="serialsearch" id="serialsearch" class="inputtext" placeholder="Serial"><br>
				</div>
				</form>
				<!-- search button. on click generateTable() method of tracktable.js file -->
				<input type="submit" class="searchButton" value="Search" onclick="generateTable()">
				<form action="logout.php">
				<!-- logout button. action: logout.php -->
				<input type="submit" style="position: absolute;bottom: 0;" class="sidebarButton" value="Logout">
				</form>
			</div>   
		    <!-- div to load the dynamic content that the user generates -->
			<div id="main">

			</div>
		</div>
	    <!-- footer with authors and organization -->
		<div id="footer">	
		<p>&copy 2014 Bern University of Applied Sciences: J. Gn&aumlgi, P. Hirschi, P. Zehnder</p>
		</div>	
	</div>
</body>
</html>
<html>
<head>
<title>BFH e-Health Login</title>

<link type="image/ico" href="http://www.ti.bfh.ch/fileadmin/templates/img/favicon.ico?xyz=123456" rel="icon">

<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/structure.css" rel="stylesheet" type="text/css">



</head>
<body>
<div id="wrapper">
	<!-- header -->
	<div id="header">
		<div id="logo"> 
			<!-- Set the Bern University of Applied Sciences icon on top -->
			<img class="headerlogo" src="img/bfh.png" name="bfh-logo" height="90px" />
		</div>	
		<div id="headertitle">
		<h1>Tracker Login</h1>
		</div>	
	</div>
	
	<!-- content -->
	<div id="content">	
	
		<div id="mainIndex">
		
				<!-- Box with 2 TextInputs and 2 Labels for Username and Password plus a Login Button. Action sent to login.php for credential validation-->
				<form class="box login" action="login.php" method="POST">
				<fieldset class="boxBody">
				<label>Username</label>
				<input type="text" tabindex="1" placeholder="Username" name="username" required>
				<label>Password</label>
				<input type="password" placeholder="Password" tabindex="2" name="password" required>
				</fieldset>
				<footer>
				<input type="submit" class="btnLogin" value="Login" tabindex="4">
				</footer>
				</form>
	    
			</form>
		</div>
	
	</div>
	
	<!-- footer -->
	<div id="footer">	
		<p>&copy 2014 Bern University of Applied Sciences: J. Gn&aumlgi, P. Hirschi, P. Zehnder</p>
	</div>
	
</div>

</body>
</html>
<?php
 /* login.php 
 *
 * This file validates the login attempt of the user.
 * Variables are passed with method POST.
 *
 * @param string $user Username
 * @param string $password Password
 *
 * @author Patrick Hirschi <patrick.hirschi@students.bfh.ch>
 * @version 1.0
 * @date 24-11-2014
 *
 * Copyright (c) 2014 Berner Fachhochschule. All rights reserved.
 */
 
 //start the session
 session_start();
 
 //check if input is set. if not: exit php code.
 if(!isset($_POST['username']) OR !isset($_POST['password'])){
  include('index.php');
  exit('Bitte geben Sie einen Usernamen und ein Passwort ein.');
 }

 $user = $_POST['username'];
 $pwd= $_POST['password'];

 // include the connection file
 include('pdo.inc.php');

 try {
   //connection to the database
   $dbhandle = mssql_connect($hostname, $username, $password)
   or die("Couldn't connect to SQL Server on $hostname"); 

   //select a database to work with
   $selected = mssql_select_db($dbname, $dbhandle)
   or die("Couldn't open database $dbname");  
   
   // build and execute the mssql query
   $query = mssql_query("SELECT * FROM users WHERE username='$user'");
   // fetch the results to an array
   $result = mssql_fetch_array($query);

   // Check the credentials. if successful: access to home.php, if not: redirect to login form
   $temp = (string)$result['password'];
   $pwd = (string)$pwd;
   if($temp==$pwd){
      $_SESSION['username'] = $user;
      $_SESSION['loggedin'] = true;
      header('location: home.php');
   }else{
	  header('location: index.php'); 
   }
   
   // close the connection
   mssql_close($dbhandle);
 }catch(PDOException $e)
   {
   echo $e->getMessage();
   }

?>
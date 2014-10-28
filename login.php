<?php
  // For the testing of this database, the username and password are the same
  // They are the names of our staff members.

if(!isset($_POST['username']) OR !isset($_POST['password'])){
  include('index.php');
  exit();
 }

session_start();
$user = $_POST['username'];
$pwd= $_POST['password'];


include('pdo.inc.php');

try {
   //connection to the database
   $dbhandle = mssql_connect($hostname, $username, $password)
   or die("Couldn't connect to SQL Server on $hostname"); 

   //select a database to work with
   $selected = mssql_select_db($dbname, $dbhandle)
   or die("Couldn't open database $dbname");  
      
   $query = mssql_query("SELECT * FROM users WHERE username='$user'");

    $result = mssql_fetch_array($query);

    /*** loop of the results ***/
    foreach($result as $row)
    {
      if($row['password']=$pwd){
      header('location: home.php');
      }

    }
   mssql_close($dbhandle);

    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

?>
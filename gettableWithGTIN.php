<?php
/* gettableWithGTIN.php 
 *
 * This file loads MSSQL Queries of the database specified in the pdo.inc.php file of the package. Based on a Global Trade Item Number (GTIN) and
 * an optional corresponding Serial Number, the File outputs a html Table with all database entries for these inputs.
 * The output table is structured in the following columns: GTIN, Serial, ExpiryDate, GLNscan, Name, Date, State.
 * The variables have to be passed with method GET.
 *
 *
 * @param string $gtin Global Trade Item Number of a Medical Product
 * @param string $serial Serial Number of the corresponding Medical Product (not necessary)
 *
 * @author Patrick Hirschi <patrick.hirschi@students.bfh.ch>
 * @version 1.0
 * @date 24-11-2014
 *
 * Copyright (c) 2014 Berner Fachhochschule. All rights reserved.
 */
 
// set the input variables gtin and serial
$gtin = $_GET['GTIN'];
$serial = $_GET['Serial'];
// check if gtin is set, if not: alert the user and exit the php-code
if($gtin==''){
	exit("Bitte geben Sie eine GTIN ein.");
}
// include the connection file
include('pdo.inc.php');
try {
   //connection to the database
   $dbhandle = mssql_connect($hostname, $username, $password)
   or die("Couldn't connect to SQL Server on $hostname"); 

   //select a database to work with (specified in pdo.inc.php)
   $selected = mssql_select_db($dbname, $dbhandle)
   or die("Couldn't open database $dbname");
   //check if serial is set. if yes: integrate in SQL statement
   if($serial!==''){
	   $query = mssql_query("SELECT GTIN, SerialNr, ExpiryDate, GLNscan,Name, ScanDate, StateName
	   FROM (SELECT GTIN, SerialNr, ExpiryDate, GLNscan, ScanDate, Name as StateName 
	   FROM TrackedItems INNER JOIN State on TrackedItems.StateNr=State.StateNr
	   WHERE GTIN='".$gtin."' AND SerialNr='".$serial."') Track INNER JOIN Institution on Institution.GLNinst = Track.GLNscan
	   UNION
	   SELECT GTIN, SerialNr, ExpiryDate, GLNscan,Name, ScanDate, StateName
	   FROM (SELECT GTIN, SerialNr, ExpiryDate, GLNscan, ScanDate, Name as StateName 
	   FROM TrackedItems INNER JOIN State on TrackedItems.StateNr=State.StateNr
	   WHERE GTIN='".$gtin."' AND SerialNr='".$serial."') Track INNER JOIN Division on Division.GLNdiv=Track.GLNscan order by GTIN ASC, SerialNr ASC, ScanDate ASC");
   }else{
	   $query = mssql_query("SELECT GTIN, SerialNr, ExpiryDate, GLNscan,Name, ScanDate, StateName
	   FROM (SELECT GTIN, SerialNr, ExpiryDate, GLNscan, ScanDate, Name as StateName 
	   FROM TrackedItems INNER JOIN State on TrackedItems.StateNr=State.StateNr
	   WHERE GTIN='".$gtin."') Track INNER JOIN Institution on Institution.GLNinst = Track.GLNscan
	   UNION
	   SELECT GTIN, SerialNr, ExpiryDate, GLNscan,Name, ScanDate, StateName
	   FROM (SELECT GTIN, SerialNr, ExpiryDate, GLNscan, ScanDate, Name as StateName 
	   FROM TrackedItems INNER JOIN State on TrackedItems.StateNr=State.StateNr
	   WHERE GTIN='".$gtin."') Track INNER JOIN Division on Division.GLNdiv=Track.GLNscan order by GTIN ASC, SerialNr ASC, ScanDate ASC");
	   }

	// build the html table header row, load style from style.css
	echo "<table class='trackingtable'><tr>
    <td class='tg-031e'>GTIN</td>
    <td class='tg-031e'>Serial</td>
    <td class='tg-031e'>Expiry Date</td>
    <td class='tg-031e'>GLNscan</td>
    <td class='tg-031e'>Name</td>
    <td class='tg-031e'>Scan Date</td>
    <td class='tg-031e'>State</td>
	</tr>";
	// loop through results, fill the html table
	while($row = mssql_fetch_row($query))
    {
    // convert dates from string to datetime (needed below to set the output format of a date in the table with ->format()-Function)
    $expdate=new DateTime($row[2]);
    $scandate=new DateTime($row[5]);
    echo "<tr>";
	echo "<td>" . $row[0] ."</td>";
	echo "<td>" . $row[1] . "</td>";
	echo "<td>" . $expdate->format('d.m.Y - H:i:s') . "</td>";
	echo "<td>" . $row[3] . "</td>";
  	echo "<td>" . $row[4] . "</td>";
    echo "<td>" . $scandate->format('d.m.Y - H:i:s') . "</td>";
    echo "<td>" . $row[6] . "</td>";
	echo "</tr>";
    }
    echo "</table>";
    // generate the refresh Button bottom right of the website
    echo "<input type='submit' style='position: relative;float:right;' class='refreshButton' value='Refresh' onclick='refreshTable()'>";
    // close the connection for security reasons
	mssql_close($dbhandle);
}catch(PDOException $e){
    //handle the exception
    echo $e->getMessage();
    }
?>
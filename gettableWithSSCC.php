<?php
/* gettableWithSSCC.php 
 *
 * This file loads MSSQL Queries of the database specified in the pdo.inc.php file of the package. Based on a Serial Shipping Container 
 * Code (SSCC), 
 * the File outputs a html Table with all database entries for the given input.
 * The output table is structured in the following columns: SSCC, GTIN, Serial, BatchLot, ExpiryDate.
 * The variable has to be passed with method GET.
 *
 *
 * @param string $sscc Serial Shipping Container Code (SSCC) of a Shipment
 *
 * @author Patrick Hirschi <patrick.hirschi@students.bfh.ch>
 * @version 1.0
 * @date 24-11-2014
 *
 * Copyright (c) 2014 Berner Fachhochschule. All rights reserved.
 */

// set the input variable sscc
$sscc = $_GET['SSCC'];
// check if sscc is set, if not: alert the user and exit the php-code
if($sscc==''){
	exit("Bitte geben Sie einen SSCC ein.");
}
// include the connection file
include('pdo.inc.php');
try {
   //connection to the database
   $dbhandle = mssql_connect($hostname, $username, $password)
   or die("Couldn't connect to SQL Server on $hostname"); 

   //select a database to work with
   $selected = mssql_select_db($dbname, $dbhandle)
   or die("Couldn't open database $dbname");
   // build and execute the query
   $query = mssql_query("SELECT SSCC,GTINsek, SerialNr, BatchLot, ExpiryDate
   FROM SecondaryPackage
   WHERE SSCC='".$sscc."'");

   // build the html table header row, load style from style.css
   echo "<table class='trackingtable'><tr>
   <td class='tg-031e'>SSCC</td>
   <td class='tg-031e'>GTIN</td>
   <td class='tg-031e'>Serial</td>
   <td class='tg-031e'>BatchLot</td>
   <td class='tg-031e'>Expiry Date</td>
   </tr>";
   // loop through results, fill the html table
   while($row = mssql_fetch_row($query))
   {
   // convert date from string to datetime (needed below to set the output format of a date in the table with ->format()-Function)
   $expdate=new DateTime($row[4]);
   echo "<tr>";
   echo "<td>" . $row[0] ."</td>";
   echo "<td>" . $row[1] . "</td>";
   echo "<td>" . $row[2] . "</td>";
   echo "<td>" . $row[3] . "</td>";
   echo "<td>" . $expdate->format('d.m.Y - H:i:s') . "</td>";
   echo "</tr>";
   }
   echo "</table>";
   // generate the refresh Button bottom right of the website
   echo "<input type='submit' style='position: relative;float:right' class='refreshButton' value='Refresh' onclick='refreshTable()'>";
   // close the connection for security reasons
   mssql_close($dbhandle);
}catch(PDOException $e){
   //handle the exception
   echo $e->getMessage();
   }
?>
<?php
$gtin = $_GET['GTIN'];
$serial = $_GET['Serial'];
if($gtin==''){
	exit("Bitte geben Sie eine GTIN ein.");
}
include('pdo.inc.php');
try {
   //connection to the database
   $dbhandle = mssql_connect($hostname, $username, $password)
   or die("Couldn't connect to SQL Server on $hostname"); 

   //select a database to work with
   $selected = mssql_select_db($dbname, $dbhandle)
   or die("Couldn't open database $dbname");
   if($serial!==''){
	   $query = mssql_query("SELECT GTIN, SerialNr, ExpiryDate, GLNscan,Name, Date, StateName
FROM (SELECT GTIN, SerialNr, ExpiryDate, GLNscan, Date, Name as StateName 
FROM TrackedItems INNER JOIN State on TrackedItems.StateNr=State.StateNr
WHERE GTIN='".$gtin."' AND SerialNr='".$serial."') Track INNER JOIN Institution on Institution.GLNinst = Track.GLNscan
UNION
SELECT GTIN, SerialNr, ExpiryDate, GLNscan,Name, Date, StateName
FROM (SELECT GTIN, SerialNr, ExpiryDate, GLNscan, Date, Name as StateName 
FROM TrackedItems INNER JOIN State on TrackedItems.StateNr=State.StateNr
WHERE GTIN='".$gtin."' AND SerialNr='".$serial."') Track INNER JOIN Division on Division.GLNdiv=Track.GLNscan");

   }else{
   $query = mssql_query("SELECT GTIN, SerialNr, ExpiryDate, GLNscan,Name, Date, StateName
FROM (SELECT GTIN, SerialNr, ExpiryDate, GLNscan, Date, Name as StateName 
FROM TrackedItems INNER JOIN State on TrackedItems.StateNr=State.StateNr
WHERE GTIN='".$gtin."') Track INNER JOIN Institution on Institution.GLNinst = Track.GLNscan
UNION
SELECT GTIN, SerialNr, ExpiryDate, GLNscan,Name, Date, StateName
FROM (SELECT GTIN, SerialNr, ExpiryDate, GLNscan, Date, Name as StateName 
FROM TrackedItems INNER JOIN State on TrackedItems.StateNr=State.StateNr
WHERE GTIN='".$gtin."') Track INNER JOIN Division on Division.GLNdiv=Track.GLNscan");
}

    /*** loop of the results ***/


echo "<table class='trackingtable'><tr>
    <td class='tg-031e'>GTIN</td>
    <td class='tg-031e'>Serial</td>
    <td class='tg-031e'>Expiry Date</td>
    <td class='tg-031e'>GLNscan</td>
    <td class='tg-031e'>Name</td>
    <td class='tg-031e'>Date</td>
    <td class='tg-031e'>State</td>
  </tr>";
while($row = mssql_fetch_row($query))
    {
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
    echo "<input type='submit' style='position: absolute;bottom: 0;right: 0;' class='refreshButton' value='Refresh' onclick='refreshTable()'>";
   mssql_close($dbhandle);
  }    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
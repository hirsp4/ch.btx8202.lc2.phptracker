<?php
include('pdo.inc.php');
try {
   //connection to the database
   $dbhandle = mssql_connect($hostname, $username, $password)
   or die("Couldn't connect to SQL Server on $hostname"); 

   //select a database to work with
   $selected = mssql_select_db($dbname, $dbhandle)
   or die("Couldn't open database $dbname");  
      
   $query = mssql_query("SELECT * FROM TrackedItems");


    /*** loop of the results ***/


echo "<table class='trackingtable'><tr>
    <td class='tg-031e'>GTIN</td>
    <td class='tg-031e'>Serial</td>
    <td class='tg-031e'>Expiry Date</td>
    <td class='tg-031e'>GLNscan</td>
    <td class='tg-031e'>Date</td>
    <td class='tg-031e'>StateNr</td>
  </tr>";
while($row = mssql_fetch_row($query))
    {
      echo "<tr>";
  echo "<td>" . $row[0] ."</td>";
  echo "<td>" . $row[1] . "</td>";
  echo "<td>" . $row[2] . "</td>";
  echo "<td>" . $row[3] . "</td>";
  echo "<td>" . $row[4] . "</td>";
    echo "<td>" . $row[5] . "</td>";
  echo "</tr>";
  
    }
    echo "</table>";
    echo "<input type='submit' style='position: absolute;bottom: 0;right: 0;' class='refreshButton' value='Refresh'>";
   mssql_close($dbhandle);
  }    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
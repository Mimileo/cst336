<?php

include '../dbConnection.php';
$dbConn = getDatabaseConnection("midterm_practice");

echo "Report 1: <br/ >";
$sql = "SELECT town_name, population 
FROM `mp_town`
WHERE population 
BETWEEN 50000 AND 80000";
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['town_name']  . " ".$record['population']. "<br />";
}

echo "<br/><br/>";

echo "Report 2: <br/ >";
$sql = "SELECT town_name,county_name,population 
FROM `mp_town`t
INNER JOIN mp_county c ON t.county_id = c.county_id
ORDER BY population DESC";
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['town_name']  ." ". $record['county_name']." ".$record['population']. " ". "<br />";
}
echo "<br/><br/>";



echo "Report 3: <br/ >";
$sql = "SELECT county_name,SUM(population) 
FROM `mp_county`c
INNER JOIN mp_town t ON c.county_id = t.county_id
GROUP BY county_name";
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['county_name']  . " ".$record['SUM(population)'] ."<br />";
}
echo "<br/><br/>";

echo "Report 4: <br/ >";
$sql = "SELECT state_name, SUM(population) FROM `mp_town` t INNER JOIN mp_county c ON t.county_id = c.county_id INNER JOIN mp_state s ON c.state_id = s.state_id GROUP BY state_name";
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['state_name']  . " ".$record['SUM(population)'] ."<br />";
}
echo "<br/><br/>";

echo "Report 5: <br/ >";
$sql = "SELECT town_name, population FROM `mp_town`
ORDER BY population LIMIT 3";
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['town_name']  ." ".$record['population']  . "<br />";
}
echo "<br/><br/>";



echo "Report 7: <br/ >";
$sql = "SELECT county_name
FROM `mp_county` c
LEFT JOIN mp_town t ON  c.county_id = t.county_id
WHERE town_name IS NULL";
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['county_name']  . "<br />";
}



?>


<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
  
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#FFF">
      <td>1</td>
      <td>The report shows all cities/towns that have a population between 50,000 and 80,000</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#FFF">
      <td>2</td>
      <td>The report shows all towns along with their county name ordered by population (from biggest to smallest)</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#FFF">
      <td>3</td>
      <td>The report lists the total population per county</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFF">
       <td>4</td>
       <td>The report lists the total population per state</td>
       <td align="center">15</td>
     </tr>
     <tr style="background-color:#FFF">
      <td>5</td>
      <td>The report lists the three least populated towns</td>
      <td width="20" align="center">10</td>
    </tr>     
    <tr style="background-color:#FFF">
      <td>6</td>
      <td>List the counties that do not have a town in the "town" table</td>
      <td width="20" align="center">10</td>
    </tr>
     <tr style="background-color:#FFF">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    

    </body>
</html>
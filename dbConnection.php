

<?php
function getDatabaseConnection(){
    $host = 'localhost';//cloud 9
$dbname = 'tcp';
$username = 'root';
$password = '';

// creates db connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// dispaly errors when accesing tables
 //display errors when accessing tables
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbConn;
}


?>
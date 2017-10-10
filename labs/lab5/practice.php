<?php
$host = 'localhost'; // clou9
$dbname = 'tcp';
$username = "root";
$password = "";
// create database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// displays database related errors
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$sql = "SELECT * FROM tc_user WHERE lastName Like 'A%'";


function usersWithanA() {
    global $dbConn;
    $sql = "SELECT firstName, lastName, email FROM tc_user WHERE firstName LIKE 'A%'";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    foreach ($records as $record) {
        echo $record['firstName'] . "  "  . $record['lastName'] . " " . $record['email'] ."<br />";
    }

}


function device() {
    global $dbConn;
    $sql = "SELECT * FROM tc_device WHERE price BETWEEN 300 and 1000";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    foreach ($records as $record) {
        echo $record['deviceId'] . "    "  . $record['deviceName'] . "   " . $record['price'] ."<br />";
    }

}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

<h3> Users whose first name starts with an A:</h3>
<?=usersWithanA()?>


<h3> Devices between $300 and $1000</h3>
<?=device()?>
    </body>
</html>
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
    $sql = "SELECT * FROM tc_device WHERE price BETWEEN 300 and 1000 ORDER BY price";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    foreach ($records as $record) {
        echo $record['deviceId'] . "    "  . $record['deviceName'] . "   " . $record['price'] ."<br />";
    }

}


function numStudnets() {
    global $dbConn;
    $sql='SELECT COUNT(1) total FROM `tc_user` WHERE role="student"';
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    foreach ($records as $record) {
        echo $record['total'] ."<br />";
    }

}



function pplperRole() {
    global $dbConn;
    $sql='SELECT role, COUNT(1) t FROM `tc_user` GROUP BY role';
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    foreach ($records as $record) {
        echo $record['role'] ." ".  $record['t'] ."<br />";
    }

}

function afirst() {
    global $dbConn;
    $sql='SELECT * FROM `tc_user` WHERE firstName LIKE "A%"';
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    foreach ($records as $record) {
        echo $record['firstName'] ." ".  $record['lastName'] ."<br />";
    }

}


function deviceTypes() {
    global $dbConn;
    $sql="SELECT DISTINCT(deviceType) 
FROM `tc_device`
ORDER BY deviceType";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    foreach ($records as $record) {
        echo $record['deviceType']  ."<br />";
    }

}



function cheapest() {
    global $dbConn;
    
$sql="SELECT deviceName,price
FROM `tc_device`
ORDER BY price
DESC LIMIT 3";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    foreach ($records as $record) {
        echo $record['deviceName']  ." ".$record['price']."<br />";
    }

}




function maxpriceanddevice() {
    global $dbConn;
    
$sql="SELECT deviceName,deviceId,price
FROM `tc_device`
WHERE price=(SELECT MAX(price) FROM tc_device)";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    foreach ($records as $record) {
        echo $record['deviceName']  ." ".$record['price']."<br />";
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

<h3> Num of students</h3>
 <?=numStudnets()?>
 
 <h3> Per role</h3>
 <?=pplperRole()?>
 
 <h3> A firstName at first letter</h3>
 <?=afirst()?>
 
  <h3> Device types</h3>
 <?=deviceTypes()?>
 
  <h3> Max device and price</h3>
 <?=maxpriceanddevice()?>
    </body>
 
</html>
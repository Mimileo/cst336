<?php
//$searchName = $_GET['value'];
//echo 'search: '.$searchName;
include("../../dbConnection.php");
$conn = getDatabaseConnection();
$searchName = $_GET['value'];

$sql = "INSERT INTO weather
        (location, time)
        VALUES
        (:search, CURRENT_TIMESTAMP())";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);  
        
        $namedParameters = array();
        $namedParameters[':search'] = $searchName;
        
        $stmt = $conn->prepare($sql);
        $stmt->excecute($namedParameters);
        
        echo "Location and time added";

$sql = "SELECT COUNT(*)
            AS Rows, location
            From weather
            WHERE location = :search";
        
        $namedParameters = array();
        $namedParameters[':search'] = $searchName;
        
        $stmt = $conn->prepare($sql);
        $stmt->excecute($namedParameters);
        $count = $stmt->fetch();
        
        echo "<h3>The keyword '" . $searchName ."' has been searched " . $count[0] . " time(s)</h3>";
        echo "<h4>History: </h4>";
        
        
$sql = "SELECT *
        FROM weather 
        WHERE location = :search";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll();
        foreach($records as $results){
            echo $results['time'];
        }
        
$sql = "INSERT INTO weather
        (location, time)
        VALUES
        (:search, CURRENT_TIMESTAMP())";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);  

?>
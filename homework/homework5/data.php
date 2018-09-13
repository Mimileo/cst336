<?php
include("../../dbConnection.php");
$conn = getDatabaseConnection();
$searchName = $_GET['value'];

function find(){
    global $conn;
    global $searchName;
}

$sql = "INSERT INTO weatherData
        (location, amtSearched, time)
        VALUES
        ('$searchName',1,now())";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

$sql = "SELECT location, SUM(amtSearched) total FROM weatherData WHERE
        location = '$searchName' GROUP BY location";
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll();
        foreach($results as $records){
            echo $record['total'];
        }

?>
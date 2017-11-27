<?php


include '../../dbConnection.php';
$conn = getDatabaseConnection();


$sql = "SELECT password
        FROM tc_user
        WHERE password = :password"; 

$namedParameters = array();
$namedParameters[':password'] = $_GET['password'];
       
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);
//$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);
echo json_encode($record);

?>

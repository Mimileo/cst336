<?php


function displayCheckoutHistory() {
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM `tc_checkout` 
            NATURAL JOIN tc_device
            NATURAL JOIN tc_user 
            WHERE deviceId = :deviceId";
    
    $namedParam = array(":deviceId"=>$_GET['deviceId']);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo  "<span> <b>Name:</b> ". $record['firstName'] . " " . $record['lastName'] . " <b>userId:</b> " . $record['userId'] . " <b>deviceId:</b> " . $record['deviceId'] . " <b>checkoutId:</b> " . $record['checkoutId'].
        " <b>checkoutDate:</b> ". $record['checkoutDate'] . " <br/><b>dueDate:</b> " . $record['dueDate'] . " <b>returnDate:</b> " . $record['returnDate'] . " " . $record['checkoutBy'] 
        . " <b>checkInBy:</b> " . $record['checkinBy'] . " <br/><b>deviceName:</b> " . $record['deviceName'] . " <b>deviceType:</b> " . $record['deviceType'] . " <b>price:</b> $" . $record['price'] . " <b>status:</b> " . $record['status'] . " <b>Email:</b> " . $record['email'] . " ".$record['universityId'] ." ".$record['gender'] ." ".$record['phone']." ".$record['role']." ".$record['deptId']."</span>";
        
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        
        <title> Checkout History </title>
        <meta charset="utf-8">
        <style>
            @import url('css/styles.css');
        </style>
    </head>
    <body>
        
        <h2> Checkout History </h2>


        <?=displayCheckoutHistory()?>

    </body>
</html>
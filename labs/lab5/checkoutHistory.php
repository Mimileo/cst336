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
        
        echo  $record['firstName'] . " &nbsp;" . $record['lastName'] . "  &nbsp;" . $record['userId'] . " &nbsp; " . $record['deviceId'] . " &nbsp; " . $record['checkoutDate']  . " &nbsp; " . $record['dueDate'] . " &nbsp; " . $record['returnDate'] . " &nbsp; " . $record['checkoutBy'] . "&nbsp;  " . $record['checkinBy'] . "<br />";
        
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Checkout History </title>
    </head>
    <body>
        
        <h2> Checkout History </h2>


        <?=displayCheckoutHistory()?>

    </body>
</html>
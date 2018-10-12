<?php
    session_start();
 
     include "dbConnection.php";
    $conn = getDatabaseConnection();
    
    
    function getItemInfo($gameId) {
        global $conn;
        $sql = "SELECT * 
                FROM ss_product
                
                WHERE product_id = ".$gameId;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    if (isset($_GET['product_id'])) {
        $_SESSION['ids'][] = $_GET['product_id'];
       // array_push($_SESSION['ids'],$_GET['product_id']);
       
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
    </body>
</html>
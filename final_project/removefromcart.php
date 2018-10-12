<?php
    session_start();
    

    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    
    
    function getItemInfo($productId) {
        global $conn;
        $sql = "SELECT * 
                FROM ss_product
               
                WHERE product_id = ".$productId;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    if (isset($_GET['product_id'])) {
         $key=array_search($_GET['product_id'],$_SESSION['ids']);
            if($key!==false){
                 unset($_SESSION['ids'][$key]);
            }
            $_SESSION["ids"] = array_values($_SESSION["ids"]);
        
        header("Location: viewcart.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
    </body>
</html>
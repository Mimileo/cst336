<?php
    session_start();
    
     include '../../dbConnection.php';
    $conn = getDatabaseConnection();
/*
    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    */
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
    
   
        

if (isset($_GET['product_id'])){
   
    //the administrator clicked on the "Add User" button
    //$key=array_search($_GET['product_id'],$_SESSION['ids']);
   
    $productInfo = getItemInfo($_GET['product_id']);
    $product_id = $productInfo['product_id'];
    $price = $productInfo['price'];
    //"INSERT INTO `tc_user` (`userId`, `firstName`, `lastName`, `email`, `universityId`, `gender`, `phone`, `role`, `deptId`) VALUES (NULL, 'a', 'a', 'a', '1', 'm', '1', '1', '1');
    
    $sql = "INSERT INTO ss_transaction
            (product_id, total_price)
            VALUES
            (:product_id, :price)";
    $namedParameters = array();
    $namedParameters[':product_id'] =  $product_id;
    $namedParameters[':price'] =  $price;
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "<h4 style='color:#4CAF50;'>Product has been purchased successfully!</h4>";
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
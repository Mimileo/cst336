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
    
function displayCust($username) {
    global $conn;
    $sql = "SELECT * 
            FROM ss_customer";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    $userId=0;
    foreach($users as $user){
        if($user['username'] == $username){
            $userId=$user['userId'];
            break;
        }
    }
    return $userId;
}
    
if(isset($_SESSION['username']) && isset($_GET['product_id'])){   
    
    $userId = displayCust($_SESSION['username']);
    $productInfo = getItemInfo($_GET['product_id']);
    $product_id = $productInfo['product_id'];
    $price = $productInfo['price'];
    //"INSERT INTO `tc_user` (`userId`, `firstName`, `lastName`, `email`, `universityId`, `gender`, `phone`, `role`, `deptId`) VALUES (NULL, 'a', 'a', 'a', '1', 'm', '1', '1', '1');
   
    $sql = "INSERT INTO ss_transaction
            (userId, product_id, total_price)
            VALUES
            (:userId, :product_id, :price)";
    $namedParameters = array();
    $namedParameters[':product_id'] =  $product_id;
    $namedParameters[':price'] =  $price;
     $namedParameters[':userId'] =  $userId;
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
   
   
    
    
     $sql = "UPDATE ss_customer
            SET last_purchase= CURRENT_TIMESTAMP()
            WHERE userId=".$userId;
   
     $namedParameters[':userId'] =  $userId;
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "<h4 style='color:#4CAF50;'>Product has been purchased successfully!</h4>";
     header("Location: viewcart.php");
}
else if(isset($_GET['product_id'])){
   
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
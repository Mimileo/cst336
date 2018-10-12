<?php
    session_start();
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
/*
    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    */
    
   
        global $conn;
        $sql = "SELECT * 
                FROM ss_product
                WHERE product_id = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array('product_id'=>$_GET['product_id']));
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($record);
    
    
  /*  if (isset($_GET['product_id'])) {
        $userInfo = getUserInfo($_GET['product_id']);
    }*/
?>


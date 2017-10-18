<?php

include '../../dbConnection.php';

$conn = getDatabaseConnection();

function getDeviceTypes() {
    global $conn;
    $sql = "SELECT DISTINCT(deviceType)
            FROM `tc_device` 
            ORDER BY deviceType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['deviceType'] . "</option>";
        
    }
}


function displayDevices(){
    global $conn;
    
    $sql = "SELECT * FROM tc_device WHERE 1";
 
    if (isset($_GET['submit'])){
        
        $namedParameters = array();
        
        
         
        if (!empty($_GET['deviceName'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND deviceName LIKE :deviceName"; //using named parameters
            $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";

         }
         
         
        if (!empty($_GET['deviceType'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND deviceType = :dType"; //using named parameters
            $namedParameters[':dType'] =   $_GET['deviceType'] ;

         }     
         
         if (isset($_GET['available'])) {
             echo $_GET['status'];
             $sql .= " AND status = :status";
             $namedParameters[':status'] =  $_GET['available'];
             
         }
         
         if(isset($_GET['orderBy']) && $_GET['orderBy'] == 'name')     {
                  $sql .= " ORDER BY deviceName";
        } else if(isset($_GET['orderBy']) && $_GET['orderBy'] == 'price'){
                  $sql .= " ORDER BY price";
        }
        
       
        
        
       
    }//endIf (isset)
    
      else  {
        $sql .= " ORDER BY deviceName";
    }
    
    
     //echo "<br/>". $sql;
    //If user types a deviceName
     //   "AND deviceName LIKE '%$_GET['deviceName']%'";
    //if user selects device type
      //  "AND deviceType = '$_GET['deviceType']";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
     foreach ($records as $record) {
    
        echo  "<p><b>Device Name: </b> ".$record['deviceName'] . " <b>Device Type:</b> " . $record['deviceType'] . " <br/><b>Price:</b> $" .
              $record['price'] .  "  <b>Status:</b> " . $record['status'] . 
             "</p><a target='checkoutHistory' href='checkoutHistory.php?deviceId=".$record['deviceId']."'> Checkout History </a><br />";
        
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5: Device Search </title>
        <meta charset="utf-8">
        <style>
               @import url('css/styles.css');
        </style>
    </head>
    <body>
        <header>
        <h1>Technology Center: Checkout System</h1>
        </header>
        
        
        <hr>
        <main>
        <?=displayDevices()?>
        </main>
        <div id="frame">
         <iframe name="checkoutHistory" height="600" allowtransparency="true"></iframe>
         </div>

    </body>
</html>
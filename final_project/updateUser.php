<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include '../../dbConnection.php';
    $conn = getDatabaseConnection();

/*
 include "dbConnection.php";
 $conn = getDatabaseConnection();
 */

function getDepartmentInfo(){
  
    
}

function getUserInfo($userId) {
    global $conn;    
    $sql = "SELECT * 
            FROM ss_customer
            WHERE userId = $userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
}


if (isset($_GET['updateUserForm'])) { //admin has submitted form to update user
    
    $sql = "UPDATE ss_customer
            SET firstName = :fName,
                lastName = :lName,
                email = :email,
                address = :address,
                phone = :phone
              
                
                
                
			WHERE userId = :userId";
	$namedParameters = array();
	$namedParameters[":fName"] = $_GET['firstName'];
	$namedParameters[":lName"] = $_GET['lastName'];
	$namedParameters[":email"] = $_GET['email'];
	$namedParameters[":address"] = $_GET['address'];
	$namedParameters[":phone"] = $_GET['phone'];


	
	$namedParameters[":userId"] = $_GET['userId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
     echo "<alert class='alert alert-success'>Success! Updated User Info</alert>";
    
}



if (isset($_GET['userId'])) {
    
    $userInfo = getUserInfo($_GET['userId']);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating User </title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
           <style>
            @import url('css/styles.css');
            </style>
    </head>
    <body>

   
    
      <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse">
      
     <h1 style="color:white;" class="text-center header"> Admin Section </h1>
    <h2  style="color:#4d4d4d;" class="text-center header"> Updating User Info </h2>

      <div class="collapse navbar-collapse" id="n">
         
       
        <br/>
          <form action="admin.php">
            <div id="admin">
            <input type="submit" value="back" />
             <div>
           </form>
    
       
      
    </nav>
    
    
    

    <fieldset>
        
        <legend class="text-center header"> Update User </legend>
        
        <form id="add">
             <input type="hidden" name="userId" value="<?=$userInfo['userId']?>" />
            First Name: <input type="text" name="firstName" required value="<?=$userInfo['firstName']?>" /> <br><br>
            Last Name: <input type="text" name="lastName" required value="<?=$userInfo['lastName']?>"/> <br><br>
            Email: <input type="text" name="email" value="<?=$userInfo['email']?>"/> <br><br>
            Address:<input type="text" name="address" value="<?=$userInfo['address']?>"/> <br><br>
            Phone: <input type="text" name="phone" value="<?=$userInfo['phone']?>"/> <br><br>
            
                        <br /><br>
                <input type="submit" name="updateUserForm" value="Update User!"/>
        </form>
        
    </fieldset>
    <div id="alert"></div>
       
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     

    </body>
</html>
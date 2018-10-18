<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}


 include "dbConnection.php";
 $conn = getDatabaseConnection();



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
                gender = :gender,
                address = :address,
                phone = :phone
              
                
                
                
			WHERE userId = :userId";
	$namedParameters = array();
	$namedParameters[":fName"] = $_GET['firstName'];
	$namedParameters[":lName"] = $_GET['lastName'];
	$namedParameters[":email"] = $_GET['email'];
	$namedParameters[":address"] = $_GET['address'];
	$namedParameters[":gender"] = $_GET['gender'];
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
            @import url('css/custom.css');
            </style>
    </head>
    <body>

   
    
      <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse">
      
     <h1 style="color:white;" class="text-center header"> Admin Section </h1>
    <h2  style="color:#4d4d4d;" class="text-center header"> Updating User Info </h2>

      <div class="collapse navbar-collapse" id="n">
         
       
        <br/>
          <form action="admin.php">
            <div id="admin" style="display:inline;float:right;">
             <button class="btn" type="submit" value="back"><span class="glyphicon glyphicon-arrow-left"></span> back</button>
             <div>
           </form>
    
       
      
    </nav>
    
    
    

    <fieldset>
        
        <legend class="text-center header"> Update User </legend>
         <section id="loginform" class="outer-wrapper" style="display: table;width: 100%;height: 100%;">
                <div class="card" > 
                     <div class="row">
                             <div class="col-sm-4 col-sm-offset-4" style="text-align:left;">
                                    <form id="add"role-"form">
                                        <div class="form-group">
                                             <input type="hidden" name="userId" value="<?=$userInfo['userId']?>" />
                                                <label>
                                                    First Name:
                                                </label> 
                                                <input type="text" name="firstName" required value="<?=$userInfo['firstName']?>" class="form-control"/><br/><br/> 
                                        </div>
                                        <div class="form-group">
                                                <label>
                                                    Last Name:
                                                </label>
                                                <input type="text" name="lastName" required value="<?=$userInfo['lastName']?>" class="form-control"/><br/><br/> 
                                        </div>
                                        <div class="form-group">
                                                <label>
                                                    Email:
                                                </label> 
                                                <input type="text" name="email" value="<?=$userInfo['email']?>" class="form-control"/><br/><br/> 
                                        </div>
                                        <div class="form-group">
                                                <label>
                                                    Address:
                                                </label>
                                                <input type="text" name="address" value="<?=$userInfo['address']?>" class="form-control"/><br/><br/> 
                                        </div>
                                        <div class="form-group">
                                                <label>
                                                    Phone:
                                                </label> 
                                                <input type="text" name="phone" value="<?=$userInfo['phone']?>" class="form-control"/><br/><br/> 
                                        </div>
                                             <div class="form-group">
                                                      <label >
                                                        Gender:&nbsp;&nbsp;&nbsp;&nbsp;           
                                                      </label>
                                            
                                                      <div class="radio-inline">
                                                        <input type="radio" name="gender" value="F" id="genderF"  <?= ($userInfo['gender']=='F') ? "checked" : "" ?>/>&nbsp;&nbsp;&nbsp;       
                                                        <label for="genderF">Female</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                      
                                                      </div>
                                                      <div class="radio-inline">
                                                        <input type="radio" name="gender" value="M" id="genderM" <?= ($userInfo['gender']=='M') ? "checked" : "" ?>/>&nbsp;&nbsp;&nbsp;       
                                                        <label for="genderM">  Male</label>
                                                      </div>    
                                                        <br><br/>
                                            </div>
                                                <div class="form-group">
                                                     <div class="col-md-offset-4 col-md-10">       
                                                        <input type="submit" id="addadmin" name="updateUserForm" value="Update User!" class="btn btn-info" role="button"/>
                                                     </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
        
    </fieldset>
    <div id="alert"></div>
       
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     

    </body>
</html>
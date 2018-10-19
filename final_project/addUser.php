<?php
session_start();
if(!isset($_SESSION['username'])) { // validates that admin has logged in
    header("Location:index.php");
}

 include "dbConnection.php";
 $conn = getDatabaseConnection();




if (isset($_GET['addUserForm'])){
    //the administrator clicked on the "Add User" button
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email    = $_GET['email'];
    $address = $_GET['address'];
    $phone = $_GET['phone'];
    $gender = $_GET['gender'];
   
    
    //"INSERT INTO `tc_user` (`userId`, `firstName`, `lastName`, `email`, `universityId`, `gender`, `phone`, `role`, `deptId`) VALUES (NULL, 'a', 'a', 'a', '1', 'm', '1', '1', '1');
    
    $sql = "INSERT INTO ss_customer
            (firstName, lastName, email, address, phone, gender, last_purchase)
            VALUES
            (:fName, :lName, :email, :address, :phone, :gender, null)";
    $namedParameters = array();
    $namedParameters[':fName'] =  $firstName;
    $namedParameters[':lName'] =  $lastName;
    $namedParameters[':email'] =  $email;
    $namedParameters[':address'] =  $address;
    $namedParameters[':phone'] =  $phone;
    $namedParameters[':gender'] =  $gender;
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "<h4 class='alert alert-success'style='color:#4CAF50;'>User has been added successfully!</h4>";
            
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Adding New User </title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
           <style>
            @import url('css/custom.css');
            </style>
            
    </head>
    
    <body>

    
   <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse" style="border-radius:0;">
      
     <h1 style="color:white;" class="text-center header"> Admin Section </h1>
    <h2  class="text-center header" style="color:#4d4d4d;"> Adding New Users </h2>

      <div class="collapse navbar-collapse" id="n">
         
       
        <br/>
          <form action="admin.php">
            <div id="admin" style="display:inline;float:right;">
             <button class= "btn" type="submit" value="back"><span class="glyphicon glyphicon-arrow-left"></span> back</button>
             <div>
           </form>
    
       
      
    </nav>
        <fieldset>
        
       
        <legend class="text-center header">Add New User</legend>
        <section id="loginform" class="outer-wrapper" style="display: table;width: 100%;height: 100%;" >
                <div class="card" > 
                     <div class="row">
                             <div class="col-sm-4 col-sm-offset-4" style="text-align:left;">
                                        <form id="add" role="form">
                                            <div class="form-group">
                                                <label>
                                                    First Name:
                                                </label> 
                                                <input type="text" name="firstName" class="form-control"/> <br/><br/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Last Name:
                                                </label> 
                                                <input type="text" name="lastName" class="form-control"/> <br/><br/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Email: 
                                                </label>
                                                <input type="text" name="email" class="form-control"/> <br/><br/>
                                            </div>
                                             <div class="form-group">
                                                <label>
                                                    Address:
                                                </label>
                                                <input type="text" name="address" class="form-control"> <br><br>
                                            </div>
                                             <div class="form-group">
                                                <label>
                                                    Phone:
                                                </label>
                                                <input type="text" name="phone" class="form-control"/> <br><br/>
                                             </div>
                                            
                                           
                                          
                                            <div class="form-group">
                                                
                                                    <label >
                                                        Gender:&nbsp;&nbsp;&nbsp;&nbsp;           
                                                     </label>
                                            
                                                      <div class="radio-inline">
                                                        <input type="radio" name="gender" value="F" id="genderF"/>&nbsp;&nbsp;&nbsp;       
                                                        <label for="genderF">Female</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                      
                                                      </div>
                                                      <div class="radio-inline">
                                                        <input type="radio" name="gender" value="M" id="genderM"/>&nbsp;&nbsp;&nbsp;       
                                                        <label for="genderM">  Male</label>
                                                      </div>    
                                                        
                                                        <br><br/>
                                                       
                                                  
                                            </div>
                                             <div class="form-group">   
                                             <div class="col-md-offset-5 col-md-10">
                                                  
                                                 
                                                  
                                           
                                                        <br /><br/>
                                                        <input id="addadmin" style=" "type="submit" name="addUserForm" value="Add User"  class="btn btn-info" role="button"/>
                                                   </div>
                                                  </div>
                                                   
                                                </div>
                                                </div>
                                                <br/><br/>
                                                
                                                
                                            
                                            
                                            
                                        
                                        </form>
                            
                                </fieldset>
                        </div>
                    </div>
            </div>
    </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    </body>
</html>
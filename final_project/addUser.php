<?php
session_start();
if(!isset($_SESSION['username'])) { // validates that admin has logged in
    header("Location:index.php");
}

 include "dbConnection.php";
 $conn = getDatabaseConnection();

function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT deptName, departmentId 
            FROM tc_department 
            ORDER BY deptName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}


if (isset($_GET['addUserForm'])){
    //the administrator clicked on the "Add User" button
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email    = $_GET['email'];
    $universityId = $_GET['universityId'];
    $phone    = $_GET['phone'];
    $gender   = $_GET['gender'];
    $role   = $_GET['role'];
    $deptId   = $_GET['deptId'];
    
    //"INSERT INTO `tc_user` (`userId`, `firstName`, `lastName`, `email`, `universityId`, `gender`, `phone`, `role`, `deptId`) VALUES (NULL, 'a', 'a', 'a', '1', 'm', '1', '1', '1');
    
    $sql = "INSERT INTO tc_user
            (firstName, lastName, email, universityId, gender, phone, role, deptId)
            VALUES
            (:fName, :lName, :email, :universityId, :gender, :phone, :role, :deptId)";
    $namedParameters = array();
    $namedParameters[':fName'] =  $firstName;
    $namedParameters[':lName'] =  $lastName;
    $namedParameters[':email'] =  $email;
    $namedParameters[':universityId'] =  $universityId;
    $namedParameters[':gender'] = $gender;
    $namedParameters[':phone']  = $phone;
    $namedParameters[':role']   = $role;
    $namedParameters[':deptId'] = $deptId;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "<h4 style='color:#4CAF50;'>User has been added successfully!</h4>";
            
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
            @import url('css/styles.css');
            </style>
            
    </head>
    
    <body>

    
   <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse">
      
     <h1 style="color:white;" class="text-center header"> Admin Section </h1>
    <h2  class="text-center header" style="color:#4d4d4d;"> Adding New Users </h2>

      <div class="collapse navbar-collapse" id="n">
         
       
        <br/>
          <form action="admin.php">
            <div id="admin">
            <input type="submit" value="back" />
             <div>
           </form>
    
       
      
    </nav>
    <fieldset>
        
       
        <legend class="text-center header">Add New User</legend>
        
        <form id="add" class="form-horizontal span8">
            <div class="md-form">
            First Name: <input type="text" name="firstName"/> <br/><br/>
            </div>
            <div class="md-form">
            Last Name: <input type="text" name="lastName"/> <br/><br/>
            </div>
            <div class="md-form">
            Email: <input type="text" name="email"/> <br/><br/>
            </div>
            
            University Id: <input type="text" name="universityId"/> <br><br/>
            Phone: <input type="text" name="phone"/> <br><br/>
            
            <div class="row">
                <div class="col-sm-2">
            Gender: 
            
                   </div>
                      <div class="col-sm-3">
                        <input type="radio" name="gender" value="F" id="genderF"/> 
                        <label for="genderF">Female</label>
                        </div>
                     
                     <div class="col-sm-3">
                        <input type="radio" name="gender" value="M" id="genderM"/> 
                        <label for="genderM">Male</label><br><br/>
                        </div>
                  
            </div>
             <div class="row">   
              <div class="col-sm-2">
            Role:  
                </div>
                 <div class="col-sm-3">
            <select name="role">
                        <option value=""> Select One </option>
                        <option>Faculty</option>
                        <option>Student</option>
                        <option>Staff</option>
                    </select>
                    </div>
                    </div>
            <br /><br/>
             <div class="row">   
              <div class="col-sm-2">
            Department: 
                </div>
                
                 <div class="col-sm-3">
                     <select name="deptId">
                            <option value=""> Select One </option>
                            <?php
                            
                                $departments = getDepartmentInfo();
                                foreach ($departments as $record) {
                                    echo "<option value='$record[departmentId]'>$record[deptName]</option>";
                                }
                            
                            ?>
                            
                        </select>
                        </div>
                        <br /><br/>
                <input type="submit" name="addUserForm" value="Add User!"/>
                <br/><br/>
                
                
            
            
            
        
        </form>
        
    </fieldset>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    </body>
</html>
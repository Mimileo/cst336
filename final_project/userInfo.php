<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}
 
include 'dbConnection.php';
$conn = getDatabaseConnection();



function displayUsers() {
    global $conn;
    $sql = "SELECT * 
            FROM ss_customer
            WHERE userId=" .$_GET['userId'];
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    return $users;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page </title>
        <script>
            
            
            
            
            function confirmDelete(firstName) {
                
                
                return confirm("Are you sure you want to delete " + firstName + "?");
                
            }
            
            
        </script>
        
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
           <style>
            @import url('css/custom.css');
            </style>
    </head>
    <body>

<div class="jumbotron">
        <h1>
  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>   User Information
 
</h1>
</div>
       
        
        <hr>
        
       
          <form action="admin.php">
            
            <div id="admin">
             <button class="btn" type="submit" value="back"><span class="glyphicon glyphicon-arrow-left"></span> back</button>
             <div>
            
        </form>
        
        
        <br /><br />
         <div class="table-responsive">
            <table class="table table-striped">
               <tbody>
                     <thead>
                <tr>
                  <th>User ID#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Last Activity</th>
                 
                </tr>
              </thead>
              <tr>
        <?php
        
        $users =displayUsers();
        
        foreach($users as $user) {
            $userDate = $user['last_activity'];
            $dt = new DateTime($userDate, new DateTimeZone('UTC'));


            $dt->setTimezone(new DateTimeZone('America/Los_Angeles'));


            $date = $dt->format('M&\nb\sp;j,&\nb\sp;Y  &\nb\sp;&\nb\sp;&\nb\sp;    g:ia  ');
            echo "<td>";
            echo $user['userId'] . "</td><td> " . $user['firstName'] . "</td><td>  " . 
            $user['lastName'] . "</td><td> ". $user['email']."</td><td> ".
            $user['address']."</td><td>".$user['gender']."</td><td> ". $user['phone'] ."</td><td> ".$date;
        
        echo "</td>";
        }
        ?>
                    </tr>
                 </tbody>
             </table>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    </body>     
</html>
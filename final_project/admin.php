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
            FROM tc_user
            ORDER BY lastName";
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
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <style>
            @import url('css/styles.css');
            </style>
   
    </head>
    
    
    <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse">
      
      <a class="navbar-brand" href="#"> <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2> </a>

      <div class="collapse navbar-collapse" id="n">
        <ul>
          <li class="nav-item">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Help</a>
          </li>
          </ul>
          </div>
          <br><br>
       
         
        <form class="form-inline my-2 my-lg-0" action="addUser.php">
            <div id="admin">
            <input id="admin" type="submit" value="Add new User" />
             <div>
        </form>
        <br/>
          <form action="logout.php">
            <div id="admin">
            <input type="submit" value="Logout" />
             <div>
           </form>
    
       
      
    </nav>

    
    
    <body>
        <blockquote class="blockquote text-center">
        <h1 id="admin"> TCP ADMIN PAGE </h1>
       
        </blockquote>
        
        <hr>
        
       
       
       
        
        <br /><br />
       
        <h3 style="text-align:center;">  <span class="glyphicon glyphicon-user" aria-hidden="true"> </span>   User Information</h3>
        <div class="table-responsive">
            <table class="table table-striped">
               
                     <thead>
                <tr>
                  <th>User ID#</th>
                  <th>Name</th>
                  <th><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></th>
                  <th><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></th>
                 
                </tr>
              </thead>
        <?php
        
        $users =displayUsers();
        
        foreach($users as $user) {
            echo "<tr>";
            echo "<td>";
            echo $user['userId'] . ' </td> ';// . $user['firstName'] . "  " . $user['lastName'];
            $name = $user['firstName'] . "  " . $user['lastName'];
             echo "</td>";
              echo "<td>";
            echo "<a class='name' href='userInfo.php?userId=".$user['userId']."'> $name </a> ";
             echo "</td>";
              echo "<td>";
            echo "<a class='btn btn-info' href='updateUser.php?userId=".$user['userId']."'> Update </a>";
             echo "</td>";
              echo "<td>";
            //echo "[<a href='deleteUser.php?userId=".$user['userId']."'> Delete </a> ]";
            echo "<form action='deleteUser.php' style='display:inline' onsubmit='return confirmDelete(\"".$user['firstName']." ".$user['lastName']."\")'>
                     <input  type='hidden' name='userId' value='".$user['userId']."' />
                     <input class='btn btn-danger' type='submit' value='Delete'>
                  </form>
                ";
                 echo "</td>";
            
            //echo "<br />";
             echo "</tr>";
            
        }
        
       
        
        ?>
                 </tbody>
             </table>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    </body>     
</html>
<?php
session_start();
//print_r($_POST);

 
include 'dbConnection.php';
$conn = getDatabaseConnection();

//print_r($conn);

$username = $_POST['username'];
$password = sha1($_POST['password']);
$user;
//The following SQL allows SQL injection
// $sql = "SELECT *
//         FROM tc_admin
//         WHERE username = '$username' 
//         AND   password = '$password'";
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

$sql = "SELECT *
        FROM ss_customer
        WHERE username = :username 
        AND  password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);

if (empty($record)) {
    $_SESSION['error'] = 'Error: Wrong Username or Password.';
    header("Location: customerlogin.php");
    
} 
else {
    
    //echo "right credentials!";
   
    $_SESSION['username'] = $record['username'];
    $_SESSION['password'] = $record['password'];
   $userId=displayCust($_SESSION['username']);
   $sql = "UPDATE ss_customer
            SET last_activity = CURRENT_TIMESTAMP()
            WHERE username=".$userId;
   
     $namedParameters[':userId'] =  $userId;
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);

    //$_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    //echo $_SESSION['adminFullName'] . "<br>";
    //echo $record['firstName'] . " " . $record['lastName'];
   header("Location: viewcart.php"); //redirecting to admin portal
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
           <style>
            @import url('css/styles.css');
            </style>
    </head>
    <body>
       
    </body>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
</html>

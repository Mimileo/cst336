<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}
 include '../../dbConnection.php';
    $conn = getDatabaseConnection();
/*

include 'dbConnection.php';
$conn = getDatabaseConnection();
*/
function avgPrice(){
    global $conn;
    $sql = "SELECT ROUND( AVG( price ), 2)
                AS avg
                FROM ss_product
                WHERE 1";

   
       
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($items as $item){
           $avgPrice= $item['avg'];
        }
        echo "<tr><td> Average Product Price: </td><td>$".$avgPrice."</td><tr>";
}

function getCustomerTotal(){
    global $conn;
    $sql = "SELECT COUNT(userId)
                AS total
                FROM ss_customer
                WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($items as $item){
           $count= $item['total'];
        }
        echo "<tr><td>Number of Customers:</td> <td>".$count."</td><tr>";
}

function getItemCount(){
     global $conn;
    $sql = "SELECT COUNT(product_id)
                AS total
                FROM ss_product
                WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($items as $item){
           $count= $item['total'];
        }
        echo "<tr><td>Amount of Products: </td><td>".$count."</td><tr>";
}

function getItemPrice(){
     global $conn;
    $sql = "SELECT ROUND(SUM(price), 2)
                AS total
                FROM ss_product
                WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($items as $item){
           $count= $item['total'];
        }
        echo "<tr><td>Price of All Products: </td><td>$".$count."</td><tr>";
}


function getSalesPerBrand(){
     global $conn;
    $sql = "SELECT brand, COUNT(brand)
                AS sales
                FROM ss_transaction
                RIGHT JOIN ss_product ON ss_transaction.product_id=ss_product.product_id
                WHERE transaction_id IS NOT NULL
                GROUP BY brand";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo"<tr><td><b>Sales Per Brand</b> </td></tr>";
       
        
        foreach($items as $item){
           //$count= $item['product_id'];
           $name = $item['brand'];
           $max = $item['sales'];
            echo "<tr><td>".$item['brand']."</td><td>".$item['sales']."</td><tr>";
        }
       
       
}





    
   
    
function displayUsers() {
   global $conn;
    $sql = "SELECT * 
            FROM ss_customer
            ORDER BY lastName";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    return $users;
}

    
         if (isset($_GET['search'])){
        
        $namedParameters = array();
        
      

         if(isset($_GET['orderBy']) && $_GET['orderBy'] == 'customer'){
             echo' <h3 style="text-align:center;">  <span class="glyphicon glyphicon-user" aria-hidden="true"> </span>   User Information</h3>
        <div class="table-responsive">
            <table class="table table-striped">
               
                     <thead>
                <tr>
                  <th>User ID#</th>
                  <th>Name</th>
                  <th><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></th>
                  <th><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></th>
                 
                </tr>
              </thead>';
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
        }else if(isset($_GET['orderBy']) && $_GET['orderBy'] == 'reports'){
             echo' <h3 style="text-align:center;">  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"> </span>   Reports Information</h3>
        <div class="table-responsive">
            <table class="table table-striped">
               
                     <thead>
                <tr>
                  <th>Report:</th>
                  <th>Values</th>
                  <th></th>
                  <th></th>
                 
                </tr>
              </thead>
              <tr>
               
              </tr>
              ';
             avgPrice();
             getCustomerTotal();
             getItemCount();
             getItemPrice();
             getSalesPerBrand();
              
        }
       
    }//endIf (isset)
       


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
       
          </div>
          <br><br>
       
         
        <form class="form-inline my-2 my-lg-0" action="addUser.php">
            <div id="admin">
            <input id="admin" type="submit" value="Add new User" />
             <div>
        </form>
        <br/>
        <form class="form-inline my-2 my-lg-0" action="addProduct.php">
            <div id="admin">
            <input id="admin" type="submit" value="Add new Product" />
             <div>
        </form>
        <br/>
        <form class="form-inline my-2 my-lg-0" action="inventory.php">
            <div id="admin">
            <input id="admin" type="submit" value="View Inventory" />
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
        <h1 id="admin"> SpreePicky ADMIN PAGE </h1>
       
        </blockquote>
        
        <hr>
        
       
       
       
        
        <br /><br />
       <div  style="margin-left:30%;">
        <form method="get">
            
                
            <b>Select Table View:</b>&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="radio-inline">
            <input type="radio" name="orderBy" id="orderByName" value="customer"/> 
             <label for="orderByName"> Customer Data </label></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="radio-inline">
           
              <input type="radio" name="orderBy" id="orderByPrice" value="reports"/> 
             <label for="orderByPrice">&nbsp; Reports </label></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <button class="btn" type="submit" name="search" value="Search">Search&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-search"></span></button>
        </form>
       </div>
        
       
        <?php
      
            
    
        
        ?>
        
                 </tbody>
             </table>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    </body>     
</html>
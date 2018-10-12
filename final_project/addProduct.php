<?php
session_start();
if(!isset($_SESSION['username'])) { // validates that admin has logged in
    header("Location:index.php");
}


 include "dbConnection.php";
 $conn = getDatabaseConnection();



if (isset($_GET['addProduct'])){
    //the administrator clicked on the "Add User" button
    $name = $_GET['name'];
    $type = $_GET['type'];
    $brand    = $_GET['brand'];
    $price = $_GET['price'];
    $img = $_GET['img'];
    $mat = $_GET['mat'];
   
    
    //"INSERT INTO `tc_user` (`userId`, `firstName`, `lastName`, `email`, `universityId`, `gender`, `phone`, `role`, `deptId`) VALUES (NULL, 'a', 'a', 'a', '1', 'm', '1', '1', '1');
    
    $sql = "INSERT INTO ss_product
            (name, type, brand, price, img, material)
            VALUES
            (:name, :type, :brand, :price, :img, :mat)";
    $namedParameters = array();
    $namedParameters[':name'] =  $name;
    $namedParameters[':type'] =  $type;
    $namedParameters[':brand'] =  $brand;
    $namedParameters[':price'] =  $price;
    $namedParameters[':img'] = $img;
    $namedParameters[':mat'] = $mat;
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "<h4 style='color:#4CAF50;'>Product has been added successfully!</h4>";
            
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Adding New Product </title>
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
    <h2  class="text-center header" style="color:#4d4d4d;"> Adding New Products </h2>

      <div class="collapse navbar-collapse" id="n">
         
       
        <br/>
          <form action="admin.php">
            <div id="admin">
            <input type="submit" value="back" />
             <div>
           </form>
    
       
      
    </nav>
    <fieldset>
        
       
        <legend class="text-center header">Add New Product</legend>
        
        <form id="add" class="form-horizontal span8" >
            <div class="md-form">
            Product Name: <input type="text" name="name"/> <br/><br/>
            </div>
            <div class="md-form">
            Type: <input type="text" name="type"/> <br/><br/>
            </div>
            <div class="md-form">
            Brand: <input type="text" name="brand"/> <br/><br/>
            </div>
            
            Price: <input type="text" name="price"/> <br><br/>
            <div class="md-form">
            Material: <input type="text" name="mat"/> <br/><br/>
            </div>
             <div class="md-form">
            Image Link: <input type="text" name="img"/> <br/><br/>
            </div>
           
                        <br /><br/>
                <input type="submit" name="addProduct" value="Add Product!"/>
                <br/><br/>
                
                
            
            
            
        
        </form>
        
    </fieldset>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    </body>
</html>
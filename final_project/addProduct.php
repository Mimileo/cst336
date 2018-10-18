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
            @import url('css/custom.css');
            </style>
            
    </head>
    
    <body>

    
   <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse" style="border-radius:0;">
      
     <h1 style="color:white;" class="text-center header"> Admin Section </h1>
    <h2  class="text-center header" style="color:#4d4d4d;"> Adding New Products </h2>

      <div class="collapse navbar-collapse" id="n">
         
       
        <br/>
          <form action="admin.php">
            <div id="admin" style="display:inline;float:right;">
           <button class= "btn" type="submit" value="back"><span class="glyphicon glyphicon-arrow-left"></span> back</button>
             <div>
           </form>
    
       
      
    </nav>
    <fieldset>
        <legend class="text-center header">Add New Product</legend>
        <section id="loginform" class="outer-wrapper" style="display: table;width: 100%;height: 100%;">
                <div class="card" > 
                     <div class="row">
                             <div class="col-sm-4 col-sm-offset-4" style="text-align:left;">
                                        <form id="add" role="form">
                                           <div class="form-group">
                                               <label>
                                                    Product Name:
                                                </label>
                                                <input type="text" name="name" class="form-control"/> <br/><br/>
                                            </div>
           
                                             <div class="form-group">
                                               <label>
                                                    Type:
                                                </label>
                                                <input type="text" name="type" class="form-control"/> <br/><br/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Brand:
                                                </label>
                                                <input type="text" name="brand" class="form-control"/> <br/><br/>
                                            </div>
                                            <div class="form-group">
                                               <label>
                                                    Price: 
                                                </label>
                                                <input type="text" name="price" class="form-control"/> <br><br/>
                                            </div>
                                             <div class="form-group">
                                               <label>
                                                    Material: 
                                                </label>
                                                <input type="text" name="mat" class="form-control"/> <br/><br/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Image Link:
                                                </label>
                                                <input type="text" name="img" class="form-control"/> <br/><br/>
                                            </div>
           
                       
                <div class="form-group">
                    <div class="col-md-offset-5 col-md-10">
                        <input id="addadmin" type="submit" name="addProduct" value="Add Product!" class="btn btn-info" role="button"/>
                    </div>
                </div>
                <br/><br/>
                
                
            
            
            
        
        </form>
        
    </fieldset>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    </body>
</html>
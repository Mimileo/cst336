<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}


 include "dbConnection.php";
 $conn = getDatabaseConnection();


function getProductInfo($product_id) {
    global $conn;    
    $sql = "SELECT * 
            FROM ss_product
            WHERE product_id = $product_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
}


if (isset($_GET['updateProductForm'])) { //admin has submitted form to update user
    
    $sql = "UPDATE ss_product
            SET name= :name,
                type = :type,
                brand = :brand,
                price = :price,
                img = :img,
                material = :mat
			WHERE product_id = :product_id";
	$namedParameters = array();
	$namedParameters[":name"] = $_GET['name'];
	$namedParameters[":type"] = $_GET['type'];
	$namedParameters[":brand"] = $_GET['brand'];
	$namedParameters[":price"] = $_GET['price'];
	$namedParameters[":img"] = $_GET['img'];
	$namedParameters[":mat"] = $_GET['mat'];
	$namedParameters[":product_id"] = $_GET['product_id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
     echo "<alert class='alert alert-success'>Success! Updated Product Info</alert>";
    
}


if (isset($_GET['product_id'])) {
    
    $productInfo = getProductInfo($_GET['product_id']);
    
    
}




?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating Product </title>
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
    <h2  style="color:#4d4d4d;" class="text-center header"> Updating Product Info </h2>

      <div class="collapse navbar-collapse" id="n">
         
       
        <br/>
          <form action="inventory.php">
            <div id="admin" style="display:inline;float:right;">
             <button class="btn" type="submit" value="back"><span class="glyphicon glyphicon-arrow-left"></span> back</button>
             <div>
           </form>
    
       
      
    </nav>
    
    
    

   <fieldset>
        
       
        <legend class="text-center header">Update Product</legend>
          <section id="loginform" class="outer-wrapper" style="display: table;width: 100%;height: 100%;">
                <div class="card" > 
                     <div class="row">
                             <div class="col-sm-4 col-sm-offset-4" style="text-align:left;">
                                    <form id="add"role-"form">
                                        <div class="form-group">
                                            <input type="hidden" name="product_id" value="<?=$productInfo['product_id']?>" />
                                                <label>
                                                    Product Name:
                                                </label> 
                                                <input type="text" name="name" required value="<?=$productInfo['name']?>" class="form-control"/><br/><br/> 
                                        </div>
                                         <div class="form-group">
                                                <label>
                                                    Type:
                                                </label> 
                                                <input type="text" name="type"  value="<?=$productInfo['type']?>" class="form-control"/> <br/><br/>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Brand:
                                            </label> 
                                            <input type="text" name="brand"  value="<?=$productInfo['brand']?>" class="form-control"/><br/><br/>
                                        </div>
                                         <div class="form-group">
                                            <label>
                                                Price:
                                            </label> 
                                            <input type="text" name="price" value="<?=$productInfo['price']?>" class="form-control"/><br/><br/>
                                            </div>
                                             <div class="form-group">
                                                    <label>
                                                        Material:
                                                    </label> 
                                                    <input type="text" name="mat" value="<?=$productInfo['material']?>" class="form-control"/><br/><br/>
                                            </div>
                                         <div class="form-group">
                                                <label>
                                                    Image Link:
                                                </label> 
                                                <input type="text" name="img" required value="<?=$productInfo['img']?>" class="form-control"/><br/><br/>
                                        </div>
                                       
                                        <div class="form-group">
                                             <div class="col-md-offset-4 col-md-10">     
                                                <input id="addadmin" type="submit" name="updateProductForm" value="Update Product!"  class="btn btn-info" role="button"/>
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
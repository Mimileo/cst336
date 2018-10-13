<?php
    session_start();
   
    
    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    
    //Display the items
    function getItems() {
        global $conn;
        $sql = "SELECT * 
                FROM ss_product
                WHERE 1";

    if (isset($_GET['search'])){
        
        $namedParameters = array();
        
        
        if (!empty($_GET['name'])) {
            //echo $_GET['deviceName'];
    //The following query allows SQL injection due to the single quotes
            $sql .= " AND name LIKE '%" . $_GET['name'] . "%'";
  
           // $sql .= " AND deviceName LIKE :deviceName"; //using named parameters
            //$namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";

         }

           // $sql .= " AND deviceName LIKE :deviceName"; //using named parameters
            //$namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%"
        if (!empty($_GET['type']) && $_GET['type']!= "Select One") {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND type = :type"; //using named parameters
            $namedParameters[':type'] =   $_GET['type'];
         }  
         if (!empty($_GET['brand']) && $_GET['brand']!= "Select One") {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND brand = :brand"; //using named parameters
            $namedParameters[':brand'] =   $_GET['brand'];
            
         }

         if(isset($_GET['orderBy'])){
            $sql .= " ORDER BY ".$_GET['orderBy']." ASC";
        } 
    }//endIf (isset)
       
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        showItems($games);
        echo '';
    }
    
    function display($items){
        /* foreach($items as $item) {
            echo $item['game_id']." ".$item['game_name'] . " " . $item['console_name']."<br>Genre: ".$item['genre'] . "<br>Release: " . $item['game_release']."</a><br>";
            
            echo "<form action='addtocart.php' style='display:inline'>";
            echo "<input type='hidden' name='itemId' value='".$item['game_id']."'>";
            echo '<button value="'.$item['game_name'].'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Add to cart</button>';
          
            echo "<br />";
        }*/
    }
    
   
    function showItems($items){
        foreach($items as $item) {
            echo "<tr><td><a href='#' class='prolink' id='".$item['product_id']."' data-toggle='modal' data-target='#bannerformmodal'>".$item['name'] . "</a></td>" . "<td> ".$item['brand'] . "</td><td> $" . $item['price']."";
            
            echo "</td><td><form action='addtocart.php' style='display:inline'>";
            echo "<input type='hidden' name='product_id' value='".$item['product_id']."'>";
            echo '<button  class="btn btn-info btn-sm" value="'.$item['name'].'"><span class="glyphicon glyphicon-ok-sign"></span>  &nbsp;&nbsp;&nbsp;Add to cart</button>';
            echo "</form>";
            echo "</td></tr>";
        }
    }
    
     if(isset($_GET['add']) && $_GET['add'] == 'Add to Cart') {
        echo "<h4>Game has been added to cart</h4>";
    }
    function getBrand() {
    global $conn;
    $sql = "SELECT DISTINCT(brand)
            FROM ss_product 
            ORDER BY brand";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['brand'] . "</option>";
        
    }
}
function getType() {
    global $conn;
    $sql = "SELECT DISTINCT(type)
            FROM ss_product 
            ORDER BY type";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['type'] . "</option>";
        
    }
}
   /* if(!isset($_SESSION['ids']) || empty($_SESSION['ids'])){
        $_SESSION['ids']=array();
    }*/
?>
<!DOCTYPE html>
<html>
    <head>
        
    
        <title>SpreePicky </title>
       <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/0797/1877/files/22_32x32.png?v=1480663515" type="image/png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
         <style>
            @import url('css/styles.css');
        </style>
    
    </head>
    <body>
        

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header ">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
            
        <a class="navbar-brand navbar-link" ><b>SpreePicky</b> </a>
      </div>
      <div id="navbar1" class="navbar-collapse collapse">
         
        <ul class="nav navbar-nav">
                
                  <li> <a href="#" class="navbar-link">Home</a></li>
                  <li> <a href="#" class="navbar-link">About</a></li>
                  <li> <a href="viewcart.php" class="navbar-link">Your Cart  &nbsp;&nbsp;&nbsp; <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                 
        </ul>
         <ul class="nav navbar-nav navbar-right">
         <li> <a href="adminloginpage.php" class="navbar-link">Admin Login &nbsp;&nbsp; <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>
      </ul>
      </div>
      <!--/.nav-collapse -->
     
    </div>
    <!--/.container-fluid -->
  </nav>

        <div class="jumbotron" style="background-image: url('img/shops.jpg');">
            
            
             
                    
               
            
            <h2>EXPLORE SHOP DISCOVER</h2>
            <p>Pastel, goth, grunge, lolita, & more styles!</p>
        </div>
       
        
       
        <hr>
        <h3>Clothing</h3>
      
        
        <form method="get">
             Product: <input type="text" name="name" placeholder="Product Name"/>
                 <div class="btn-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Type:  <select style="color:white;"name="type" class="selectpicker" >
                <option value="">Select One</option>
                    <?=getType()?>
                </select>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Brand:  <select style="color:white;"class="selectpicker"  name="brand">
                <option value="">Select One</option>
                    <?=getBrand()?>
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
            Order by:&nbsp;
            <div class="radio-inline">
            <input type="radio" name="orderBy" id="orderByName" value="name"/> 
             <label for="orderByName"> Name </label></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="radio-inline">
            <input type="radio" name="orderBy" id="orderByPrice" value="price"/> 
             <label for="orderByPrice"> Price </label></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <button class="btn" type="submit" name="search" value="Search">Search&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-search"></span></button>
        </form>
        <br>
        
         <table class="table table-hover">
            <thead>
      <tr>
        <th>Item</th>
        <th>Brand</th>
        <th>Price</tjh>
    
       
        </tr>
        </thead>
        <tbody>
        <?php getItems(); ?>
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="productImg" style="text-align:center;"></div>
      </div>
      <div class="modal-footer">
       <div id="productInfo" style="text-align:center;"></div>
      </div>
    </div>
  </div>
</div>
        </tbody>
       
        </div>
        
        <script>
        
       
                $(document).ready(function(){
                    $(".btn-info").click(function(){
                      // $(".alert").removeClass("in").show();
                       //$(".msg").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Added</strong> " + $(this).attr('value') + " item to your cart.</div>")
	                   //$(".alert").delay("slow").addClass("in").fadeOut();
                        alert("Added " + $(this).attr('value') + " item to your cart.");
                        
                    });
                    $(".prolink").click(function(){
                        $('#productModal').modal("show");
                        $('#productInfo').empty();
                        //$('#productInfo').empty();
                          $.ajax({
                                    type: "GET",
                                     url: "viewitem.php",
                                dataType: "json",
                                    data: {
                                           "product_id": $(this).attr('id')
                                           
                                    },
                                    success: function(data,status) {
                                       
                                        $("#productImg").html("<img src='" +data.img + "' width='300' height='300' alt='"+data.name+"'>" );
                                        $("#productInfo").html("<p class='text text-info'>Product name: " + data.name + "</p><p class='text text-info'>Material: " + data.material + "</p>");
                                      },
                                    complete: function(data,status) { //optional, used for debugging purposes
                                         // alert(status); 
                                    }
                                 });
                        
                    });
                    
                });
        </script>
    </body>
</html>
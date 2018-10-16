<?php
    session_start();
   
    
    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    function getCategory() {
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
        

    }
    
  
   
    function showItems($items){
        $count=0;
        echo "<tr>";
        foreach($items as $item) {
            $count++;
            echo "<td style='margin-right:30px;'><div style='text-align:center;'><div style='margin-bottom:10px;'><a style='margin-left:50px;' href='#' class='prolink' id='".$item['product_id']."' data-toggle='modal' data-target='#bannerformmodal'><img src='".$item['img'] . "' alt='".$item['name']."' width='250' height='250'></a></div><p style='text-align:center;'>Price:  $" . $item['price']."</p>";
            
            echo "<form action='addtocart.php' style='text-align:center;'>";
            echo "<input type='hidden' name='product_id' value='".$item['product_id']."'>";
            echo '<button  class="btn btn-info btn-sm" value="'.$item['name'].'"><span class="glyphicon glyphicon-ok-sign"></span>  &nbsp;&nbsp;&nbsp;Add to cart</button>';
            echo "</form></div></div>";
            echo "</td>";
            if($count % 3 == 0){
                echo "</tr><tr>";
            }
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
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
       
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
       

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        
                 <style>
            @import url('https://fonts.googleapis.com/css?family=Parisienne');
        </style>
         <link rel="stylesheet" href="css/custom.css">
   
    </head>
    <body>
        

  <nav class="navbar  navbar-inverse navbar-fixed-top">
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
                
                  <li> <a href="#home" class="navbar-link">Home</a></li>
                 
                  <li> <a href="#store" class="navbar-link">Store</a></li>
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

        <div id="home" class="jumbotron" style="  background-image: url('img/shops.jpg'); ">
          
            
             
                    
               
            <div id="store-info" style="margin:25%;" >
            <h1 id="home-head">Explore, Shop, Discover</h1>
            <p>Pastel, goth, grunge, lolita, & more styles!</p>
            </div>
        </div>
       
        <div id="store">
       
        <hr>
        
        <h3 style="text-align:center;">Broswe:</h3>
      
         <div id="home-search" class="col-md-offset-2">
        <form method="get">
           <div class="row" style="margin-left:20px;"> 
               <div class="form-group">
                     <div class="col-sm-4">
                         <label>Product:</label> <input type="text" name="name" placeholder="Product Name" class="form-control"/>
                    </div>
                </div>
                 <div class="form-group">
                     <div class="col-sm-4">
                            <label>Type:</label> 
                                <select style="color:white;"name="type" class="selectpicker" class="form-control">
                                    <option value="">Select</option>
                                        <?=getCategory()?>
                                </select>
                    </div>        
                </div>
                 <div class="form-group">
                     <div class="col-sm-4" style="margin-left:-110px;">
                         <label>Brand:</label>
                            <select style="color:white;"class="selectpicker"  name="brand" class="form-control">
                            <option value="">Select</option>
                                <?=getBrand()?>
                            </select>
                        </div>
                 </div>
             </div>
             <div class="row" style="margin-left:170px;margin-top:30px;"> 
                <div class="form-group">
                   <div class="row">
                       <div class="col-sm-2">
                        <label>Order by:</label>
                       </div>
                           <div class="col-sm-2">
                                <div class="radio-inline">
                                    
                                    <input type="radio" name="orderBy" id="orderByName" value="name" /> 
                                        <label for="orderByName"> Name </label>
                                </div>
                            </div>
                       
                            <div class="col-sm-2">
                                <div class="radio-inline">
                                    <input type="radio" name="orderBy" id="orderByPrice" value="price" /> 
                                         <label for="orderByPrice"> Price </label>
                                </div>
                            </div>
                  
            
            
                         <div class="col-sm-4" style="margin-left:50px;">
                            <button id="home-btn" class="btn btn-default" type="submit" name="search" value="Search">Search&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-search"></span></button>
                           </div>
                   </div>
                </div>
            </div>
        </form>
        </div>
        <br>
        <div style="text-align:center; margin-left: 16%;">
         <div class="col-sm-9 ">
         <table id="tab" class="table table-hover" style="cell-spacing:10px;">
            <thead>
      <tr>
        <th></th>
        <th></th>
        <th></tjh>
    
       
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
       </table>
       </div>
       </div>
        </div>
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
                         $('#productInfo').empty();
                         $('#productImg').html("<img src='img/Loading_icon.gif'>");
                        $('#productModal').modal("show");
                       
                          $.ajax({
                                    type: "GET",
                                     url: "viewitem.php",
                                dataType: "json",
                                    data: {
                                           "product_id": $(this).attr('id')
                                           
                                    },
                                    success: function(data,status) {
                                       
                                        $("#productImg").html("<img src='" +data.img + "' width='300' height='300' alt='"+data.name+"'>" );
                                        $("#productInfo").html("<p class='text text-info'>Product name: " + data.name + "</p><p class='text text-info'>Brand: " + data.brand + "</p><p class='text text-info'>Type: " + data.type + "</p><p class='text text-info'>Price: $"+data.price+"</p><p class='text text-info'>Material: " + data.material + "</p>");
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
<?php
    session_start();
    
    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    
    //Display the items
    function getItem($itemId) {
        global $conn;
        $sql = "SELECT * 
                FROM ss_product
                WHERE product_id = $itemId";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    
        return $user;
    }
    
    
    function showItem($item){
     echo"   
    ";
        
        
        echo "<td><a href='#' class='prolink' id='".$item['product_id']."' data-toggle='modal' data-target='#bannerformmodal'>".$item['name'] . "</a> </td><td>" . $item['brand']."</td><td>$".$item['price'] . "</td><td>";
             echo "<form action='buyitem.php' style='display:inline'>";
            echo "<input type='hidden' name='product_id' value='".$item['product_id']."'>";
            echo "<button class='btn btn-info' role='button'type='submit' value='".$item['name']."'>
            Buy Item &nbsp<span class='glyphicon glyphicon-ok'></span></button>";
            echo "</form></td><td>";
            echo "<form action='removefromcart.php' style='display:inline'>";
            echo "<input type='hidden' name='product_id' value='".$item['product_id']."'>";
            echo "<button  class='btn btn-danger' role='button'type='submit' value='Remove from Cart'>
            Remove from Cart &nbsp<span class='glyphicon glyphicon-remove'></span></button>";
            echo "</form></td>";
            echo "</tr>";
            
    }
    
    function getCart(){
        if(isset($_SESSION['ids'])){
             //var_dump($_SESSION['ids']);
            foreach($_SESSION['ids'] as $record){
                
                $item = getItem($record);
                showItem($item);
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Cart </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
       <style>
        @import url('css/styles.css');
        </style>
   
    </head>
    <body>
       
        <div class= "jumbotron" style="height:145px;padding-bottom:-100px;">
             <?php
        if(isset($_SESSION['username'])){
            echo "<p style='display:inline;margin-left:10px;font-size:2em;'>Welcome " . $_SESSION['username']."</p>" ;
        }
        ?>
    
        <h2 style="text-align:center;padding-bottom:-150px;"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;&nbsp;
         
        Your Cart</h2>
        </div>
        <?php
        if(isset($_SESSION['username'])) {
            echo "<form action='logout.php'>
            <div id='admin' style='margin-left:10px;'>
            <input type='submit' value='Logout' role='btn' class='btn btn-default'/>
             <div>
           </form>";
        }
           
           ?>
        <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover">
            
            <thead>
        <tr>
         <th>Product</th>
         <th>Brand</th>
         <th>Price</th>
        </tr>
        </thead>
        <tbody>
       <?php getCart(); ?>
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
        <form action="index.php">
            <div id="admin">
            <button class= "btn" type="submit" value="back"><span class="glyphicon glyphicon-arrow-left"></span> back</button>
             <div>
           </form>
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
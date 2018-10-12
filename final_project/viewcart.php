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
        
        
        echo "<td><a href='viewitem.php?product_id=".$item['product_id']."'>".$item['name'] . "</a> </td><td>" . $item['brand']."</td><td>$".$item['price'] . "</td><td>";
             echo "<form action='buyitem.php' style='display:inline'>";
            echo "<input type='hidden' name='product_id' value='".$item['product_id']."'>";
            echo "<button  class='btn btn-info' role='button'type='submit' value='Buy Item'>
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
        <div class= "jumbotron" style="height:100px;padding-bottom:-100px;">
        <h2 style="text-align:center;padding-bottom:-150px;"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;&nbsp;Your Cart</h2>
        </div>
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
       </tbody>
       </table>
       </div>
        <form action="index.php">
            <div id="admin">
            <button class= "btn" type="submit" value="back"><span class="glyphicon glyphicon-arrow-left"></span> back</button>
             <div>
           </form>
    </body>
</html>
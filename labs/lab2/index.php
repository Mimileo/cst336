 <?php
     include 'inc/functions.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width">
        <title> 777 Slot Machine </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div id="main">
            <?php
                play();
            ?>
            
           <form>
               <input type="submit" value="Spin!"/>
           </form>
           
       </div>
    </body>
</html>
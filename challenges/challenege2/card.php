<?php

     include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Random Card Generator </title>
        <meta charset="utf-8"/>
                <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div id="main">
        <h1>Random Card Generator</h1>
        <div id="hc">
        <p id="h">Human</p>
        <p id="c">Computer</p>
        </div>
        <?php
                player();
            ?>
       
       
        </div>
        
    </body>
</html>
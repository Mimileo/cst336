<?php


$winner = 'n';
// check if button pressed
// post to retrieve value from submit
$grid = array_fill(0, 9,'');

echo "<header><h1 id='tictac'>Tic Tac Toe</h1></header>";

$first = round(rand(0,1));
echo ($first == 0) ? "<h2>Human Player Turn</h2>" : "<h2>CPU Player Turn</h2>";
    
   
if(isset($_POST["submit"])) {
   
    $count+=1;
    $grid[0] = $_POST["grid0"]; 
    $grid[1] = $_POST["grid1"]; 
    $grid[2] = $_POST["grid2"]; 
    $grid[3] = $_POST["grid3"]; 
    $grid[4] = $_POST["grid4"]; 
    $grid[5] = $_POST["grid5"]; 
    $grid[6] = $_POST["grid6"]; 
    $grid[7] = $_POST["grid7"]; 
    $grid[8] = $_POST["grid8"]; 
    //print_r($grid);
    
    if (($grid[0] == 'x' && $grid[1] == 'x' && $grid[2] =='x') || ($grid[3] == 'x' && $grid[4] == 'x' && $grid[5] =='x') || ($grid[6] == 'x' && $grid[7] == 'x' && $grid[8] =='x') 
    || ($grid[0] == 'x' && $grid[3] == 'x' && $grid[6] =='x') || ($grid[1] == 'x' && $grid[4] == 'x' && $grid[7] =='x') || ($grid[2] == 'x' && $grid[5] == 'x' && $grid[8]=='x') 
    || ($grid[0] == 'x' && $grid[4] == 'x' && $grid[8] =='x') || ($grid[2] == 'x' && $grid[4] == 'x' && $grid[6] =='x'))
    {
        $winner = 'x';
        echo "<h2>You Win!</h2>";
        
    }
    $blank = 0;
    $arlen = count($grid);
    for($i=0;$i<$arlen;$i++){
        if ($grid[$i] == '') {
            $blank = 1;
        }
    }
    // cpu player
    if ($blank == 1 && $winner == 'n'){
        $i = array_rand($grid);
        while ($grid[$i] != ''){
            $i = array_rand($grid);
           // $i = rand() % 8;
        }
        
    $grid[$i] = 'o';
        
    if (($grid[0] == 'o' && $grid[1] == 'o' && $grid[2] =='o') || ($grid[3] == 'o' && $grid[4] == 'o' && $grid[5] =='o') || ($grid[6] == 'o' && $grid[7] == 'o' && $grid[8] =='o') 
    || ($grid[0] == 'o' && $grid[3] == 'o' && $grid[6] =='o') || ($grid[1] == 'o' && $grid[4] == 'o' && $grid[7] =='o') || ($grid[2] == 'o' && $grid[5] == 'o' && $grid[8] =='o') 
    || ($grid[0] == 'o' && $grid[4] == 'o' && $grid[8] =='o') || ($grid[2] == 'o' && $grid[4] == 'o' && $grid[6] =='o'))
    {
        $winner = 'o';
        echo "<h2> O win! </h2>";
    }
    } else if ($winner == 'n'){
     $winner = 't';
     echo "<h2> Tie! </h2>";
 }
 
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width">
        <title> Tictactoe </title>
        <style>
        
           
            @import url("css/styles.css");
@import url('https://fonts.googleapis.com/css?family=Lobster');
</style>
    </head>
    <body>
         
       
       <form name="tictactoe" method="post" action="index.php">
            <?php
            echo "<main>";
            for($i=0;$i<9;$i++) {
               echo "<input id='grid' type='text' name='grid$i' value='$grid[$i]'>";
   
                if($i % 3 == 2) {
                    echo "<br>";
                }
            }
        
             
               
        
            if($winner == 'n'){
                echo "<div id='btn'>";
            echo '<button id="go" type="submit" name="submit" value="Go"><img src="img/btn.png"/></button>';
             echo "</div>";
           
             }
            
             else{
                echo '<input id="Play" type="button" name="new" value="Play Again" onclick="window.location.href=\'index.php\'">';
            }
            echo " </main>";
           
            if($winner == 'x'){
                 echo "<div id='msg'><img src='img/win.png'/></div>";
             }
            // echo "<input id='first' type='text' name='Who will go first?' value='$first'>";
        
                ?>
       
       
         <footer>
            <h4> Rules: </h4>
            <br>
              
            <aside>Unfair Tic Tac Toe, where player turn is random.<br>Enter x to make a move.<br>Click button for computer turn.<aside>
            
         </footer>
       
    </body>
</html>
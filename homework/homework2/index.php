<?php
$first = round(rand(0,1));
echo ($first == 0) ? "Human Player Goes First" : "CPU Player Goes first";
while($winner = 'n'){
// check if button pressed
// post to retrieve value from submit
$grid = array_fill(0, 9,'');

if(isset($_POST["submit"])) {
    $grid[0] = $_POST["grid0"]; 
    $grid[1] = $_POST["grid1"]; 
    $grid[2] = $_POST["grid2"]; 
    $grid[3] = $_POST["grid3"]; 
    $grid[4] = $_POST["grid4"]; 
    $grid[5] = $_POST["grid5"]; 
    $grid[6] = $_POST["grid6"]; 
    $grid[7] = $_POST["grid7"]; 
    $grid[8] = $_POST["grid8"]; 
    print_r($grid);
    
    if (($grid[0] == 'x' && $grid[1] == 'x' && $grid[2] =='x') || ($grid[3] == 'x' && $grid[4] == 'x' && $grid[5] =='x') || ($grid[6] == 'x' && $grid[7] == 'x' && $grid[8] =='x') 
    || ($grid[0] == 'x' && $grid[3] == 'x' && $grid[6] =='x') || ($grid[1] == 'x' && $grid[4] == 'x' && $grid[7] =='x') || ($grid[2] == 'x' && $grid[5] == 'x' && $grid[8]=='x') 
    || ($grid[0] == 'x' && $grid[4] == 'x' && $grid[8] =='x') || ($grid[2] == 'x' && $grid[4] == 'x' && $grid[6] =='x'))
    {
        $winner = 'x';
        echo "<h2>X wins</h2>";
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
     echo "<h2> Tied game </h2>";
 }
    
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
        </style>
    </head>
    <body>
       <form name="tictactoe" method="post" action="index.php">
            <?php
           
            for($i=0;$i<9;$i++) {
               echo "<input id='grid' type='text' name='grid$i' value='$grid[$i]'>";
    //$i==2 || $i==5 || $i==8
                if($i % 3 == 2) {
                    echo "<br>";
                }
            }
            
            if($winner == 'n'){
            echo '<input id="Go!" type="submit" name="submit" value="Go">';
            } else {
                echo '<input id="Play" type="button" name="new" value="Play Again" onclick="window.location.href=\'index.php\'">';
            }
           
             echo "<input id='first' type='text' name='Who will go first?' value='$first'>";
        
                ?>
        <header>
           
        </header>
        <main>
            <p></p>
            
        </main>
       
    </body>
</html>
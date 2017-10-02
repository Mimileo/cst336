<?php
$start = microtime(true);

session_start(); //start or resume a session
//session_destroy();
if (!isset($_SESSION['matchCount'])) { //checks whether the session exists
    $_SESSION['matchCount'] = 1;
    $_SESSION['totalElapsedTime'] = 0;
}

    $deck = array();
    $suits = array("clubs","spades","hearts","diamonds");
    
    $player1 = array();
    $player2 = array();
    $player3 = array();
    $player4 = array();


for ($i = 0; $i < 4; $i++) {
    for ($j = 1; $j <= 13; $j++) {
    
        $deck[] = $suits[$i] . "_" . $j;
    }
    
}

function drawCard(){
    global $deck;
    $chosen;
    shuffle($deck);
    $chosen = array_pop($deck);
    return $chosen;
}

function play($chosen){
    $stringParts = explode("_", $chosen);

    $firstPart  = $stringParts[0]; 
    $secondPart = $stringParts[1];
    echo "<img src='../lab3/cards/$firstPart/$secondPart.png' alt='$firstPart'>";
    return $stringParts[1];
}

function player(){
    $total = 0;
    while($total <= 35 ) {
        $val = play(drawCard());
        //if($val + $total > 42){
          //  break;
        //}
        $total+= $val; //still draws past 42 :c
    }
    return $total;
}


function playerToll(){
    global $playerscore;
     $pics = array("pic1","pic2","pic3", "pic4");
     $names = array("Player 1", "Player 2", "Player 3", "Player 4");
     $winner = array();

     $ar = array(0,1,2,3);
     shuffle($ar);
     //print_r($ar);
     $playerNameScore=array("Player 1"=> 0,"Player 2"=> 0, "Player 3"=> 0,"Player 4"=> 0);
    for($i = 1;$i<=4;$i++) {
                $k=$ar[$i-1];  
                echo "<img src='img/$pics[$k].png' width='100'>" . $names[$k];
                ${"player" . $i } = player();
                echo "<span> 	&nbsp;&nbsp;&nbsp;${'player' . $i }</span>";
                $playerScore[] = ${'player' . $i};
                if($k == 0)
                $playerNameScore["Player 1"] = ${'player' . $i};
                if($k == 1)
                $playerNameScore["Player 2"] = ${'player' . $i};
                if($k == 2)
                $playerNameScore["Player 3"] = ${'player' . $i};
                if($k == 3)
                $playerNameScore["Player 4"] = ${'player' . $i};
                //print_r($playerNameScore);
                //print_r($playerScore);
             
                echo "<br>";
                
        }
        echo "  ";
         //print_r($player1);
        
        displayWinner($playerScore, $playerNameScore);
}

function displayWinner($playerScore, $playerNameScore) {
   // if($playerScore ==)
   
   $winner=array();
    $max = 0;
    $index = 0;
    $tie = 0;
    foreach($playerNameScore as $score) {
        if ($score > $max && $score <= 42) {
            $max = $score;
        }
    }
    
    //echo "<br/> The max score is : ". $max ."<br/>";
   /* for($i=0;$i<4;$i++) {
        if($playerScore[$i] > $max && $playerScore[$i] <= 42  ) {
            
             $max = $playerScore[$i];
             $index = $i+1;
            //echo $max;
           
        }
       
    }
  */
  
   foreach($playerNameScore as $score) {
        if ($score == $max) 
            $tie+=1;
        
    }
/*for($j=0;$j<4;$j++) {
          if($playerScore[$j] == $max){
              array_push($winner, $j+1);
              print_r($winner);
          }
        if($j == $index-1)
        continue;
        else { //&& $playerScore[$index-1] != $playerScore[$j]
             if($playerScore[$j] == $max ) {
                 $tie+=1;
             }
        }
    }*/
    
    /* $points = array_sum($playerScore);
    for($i=0;$i<count($winner);$i++){
       
        //echo "Subtract loser points";
        $points= $points - $playerScore[($winner[$i])-1];
        //echo $points;
     }*/
     $points = array_sum($playerScore);
    if($tie > 1 ) {// || $index==0
    echo "Tie!<br>";
     $points=$points - ($max*$tie);
        foreach($playerNameScore as $name => $score){
            if ($score == $max) {
                 //$points=$points - $max;
                echo $name . " wins " .$points ." points!<br>";
            }
        }
        /*echo "Tie!<br>";
        for($i=0;$i<count($winner);$i++){
            echo "Player ". $playerScore[($winner[$i])+1] . " wins " . $points . " points!<br>";
        }*/
    }
    else {
         $points=$points - $max;
         foreach($playerNameScore as $name => $score){
            if ($score == $max) 
            
                echo $name . " wins " . $points ." points!<br>";
            
        }
    }
}



function elapsedTime(){
global $start;
     echo "<hr>";
     $elapsedSecs = microtime(true) - $start;
     echo "This match elapsed time: " . $elapsedSecs . " secs <br /><br/>";

     echo "Matches played:"  . $_SESSION['matchCount'] . "<br /> <br/>";

     $_SESSION['totalElapsedTime'] += $elapsedSecs;
     
     echo "Total elapsed time in all matches: " .  $_SESSION['totalElapsedTime'] . "<br /><br />";
     
     echo "Average time: " . ( $_SESSION['totalElapsedTime']  / $_SESSION['matchCount']);
     
     $_SESSION['matchCount']++;
} //elapsedTime






        

?>
        

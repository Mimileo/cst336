<?php


    $deck = array();
    $suits = array("clubs","spades","hearts","diamonds");
    $ranks = array("ace","jack","king", "queen", "ten");
    

for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 5; $j++) {
       
      
            
            $deck[] = $suits[$i] . "_" . $ranks[$j];
            //echo $suits[$i] . "_" . $ranks[$j]."<br>";
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
    echo $ranks[$secondPart % 5];
    echo "<img src='img/cards/$firstPart/$secondPart.png' alt='$firstPart'>";
    
     switch ($secondPart) {
       case 'ace':
           $val = 14;
           break;
       
       case 'jack':
           $val = 13;
           break;
        case 'king':
           $val = 12;
           break;
           
        case 'queen':
           $val = 11;
           break;
        case 'ten':
           $val = 10;
           break;
   }
    return $val;
}

function player(){
 
  
    //$total = 0;
    //while($total <= 35 ) {
        echo "<br/>";
       $humanPlayer = play(drawCard());
       //echo $humanPlayer;
       //echo "<img id='human' src='img/cards/".$ranks[$humanPlayer%5].".png'>";
       $cpuPlayer = play(drawCard());
        //echo "<img id='comp' src='img/cards/".$ranks[$cpuPlayer%5].".png'>";
       if($humanPlayer > $cpuPlayer) {
           echo "<p>Human Player wins!</p>";
       }
       
       elseif ($humanPlayer < $cpuPlayer) {
           // code...
           echo "<p>Computer Player wins!</p>";
       }
       
       else{
           echo "Tie!";
       }
        //if($val + $total > 42){
          //  break;
        //}
       // $total+= $val; //still draws past 42 :c
    //}
   
}


        
        
?>
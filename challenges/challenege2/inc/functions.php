<?php
function displayCard($randomValueC, $randomValueS, $pos) {
             
            switch ($randomValueC) { //sets the value of the card
                
                case 0: $card = "ten";
                    break;
                case 1: $card = "jack";
                    break;
                case 2: $card = "queen";
                    break;
                case 3: $card = "king";
                    break;
                case 4:$card = "ace";
                    break;
                }//endSwitch
                
                switch ($randomValueS) { // sets the suit of the card
                
                case 0: $suit = "clubs";
                    break;
                case 1: $suit = "diamonds";
                    break;
                case 2: $suit = "hearts";
                    break;
                case 3:$suit = "spades";
                    break;
                }//endSwitch
                
            echo "<img id='reel$pos'src='img/cards/$suit/$card.png' alt='$card' . '$suit' title='" . ucfirst($card) ."' width='70'/>";
        }
        
        function displayWinner ($randomValueCardHuman, $randomValueCardComputer){
            
            echo "<div id='output'>";
            if ($randomValueCardHuman > $randomValueCardComputer) {
                echo "<h2>Human wins!</h2>";
                }
            else if($randomValueCardHuman < $randomValueCardComputer){
                echo "<h2>Computer wins!</h2>";
            }   else {
                    echo "<h3> Tie game! </h3>";
            }
            echo "</div>";
        }
        
        function play() {
            for ($i=1; $i<3; $i++){
                ${"randomValueC" . $i } = rand(0,4);
                ${"randomValueS" . $i } = rand(0,3);
                displayCard(${"randomValueC" . $i }, ${"randomValueS" . $i}, $pos );
            }
            displayWinner($randomValueCardHuman, $randomValueCardComputer);
        }
        
        
        
        
?>
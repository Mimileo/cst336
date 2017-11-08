       
          
          // Creating an array of available letters

/*global $*/
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']; 
 




 
 
            var selectedWord = "";
            var selectedHint = "";
            var board = "";
            var remainingGuesses = 6;
            var words = ["snake", "monkey", "beetle","octopus", "horse"];
             
           
            
            // Begin the game when the page is fully loaded
            window.onload = startGame();
            
            function startGame() {
                pickWord();
                initBoard();
                updateBoard();
                createLetters();
            }
            
            
           
            
           
            
            
            function pickWord() {
                 var randomInt = Math.floor(Math.random() * words.length);
                 selectedWord = words[randomInt].toUpperCase();
                 // console.log(selectedWord)
            }
            
            function updateBoard() {
                for(var letter of board) {
                     document.getElementById("word").innerHTML += letter + " ";
                 }
            }
            
            
            // fill the board with underscores
            function initBoard() {
                //for (var letter in selectedWord) {
                for(var i = 0; i < selectedWord.length; i++) {
                    board += '_';
                }
                console.log(board)
            }
            
            function createLetters() {
                for (var letter of alphabet) {
                    $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
                }
            }
            
            
            
            function checkLetter(letter) {
                var positions = [];
                
                // put all the positions the letter exists in an array
                for(var i = 0; i < selectedWord.length; i++) {
                    console.log(selectedWord)
                    if(letter == selectedWord[i]){
                        positions.push(i);
                    }
                }
                
                if (positions.length > 0) {
                    updateWord(positions, letter);
                } else {
                    remainingGuesses--;
                     $('#hangImg').attr('src', 'img/stick_' + (6 - remainingGuesses) + '.png');

                }
            }
            
            // update the current word then calls for a board update
            function updateWord(positions, letter) {
                for(var pos of positions) {
                    board = replaceAt(board,pos,letter);
                }
                updateBoard();
            }

            // helper function for replacing specific indexes in a string
            function replaceAt(str,index,value){
                return str.substr(0,index) + value + str.substr(index + value.length);
            }
            /*$("#btn").click(function(){
                
            updateImage();
                
                
            });
            function updateImage(){
               // document.getElementById("man").innerHTML="<img src='img/stick_5.png'>";
               $("#man").attr("src",'img/stick_5.png');
            }*/
            
            function updateMan() {
                $('#hangImg').attr('src', 'img/stick_' + (6 - remainingGuesses) + '.png');
            }
                  $("#letterBtn").click( function(){ 
               // updateImage();
               
               var boxVal = $("#letterBox").val();
               alert(boxVal);
               
            } );
            
            // events - location is important
            $("button").click( function(){ //alert( $(this).attr("id"));
            
                checkLetter( $(this).attr('id') );
                
                
            });
            
    
            function updateImage() {
                
                //document.getElementById("man").innerHTML = "<img src='img/stick_5.png' >";
                $("img").attr("src","img/stick_3.png");
            }
          
          
              $(".letter").click(function(){
    console.log($(this).attr("id"));
    });
            
         
            




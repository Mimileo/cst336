       
          
          // Creating an array of available letters

/*global $*/
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']; 
 




 
 
            var selectedWord = "";
            var selectedHint = "";
            var board = "";
            var remainingGuesses = 6;
            var words = [{ word: "snake", hint: "It's reptile" },
                         { word: "monkey", hint: "It's a mammal"},
                         { word: "beetle", hint: "It's an insect"},
                         { word: "octopus", hint: "It's a mollusk" },
                         { word: "horse", hint: "It's a mammal that you can see at a farm"}];
             
           
            
            // Begin the game when the page is fully loaded
            window.onload = startGame();
            /*global $*/
            $(".replayBtn").on("click", function() {
                    window.location.reload();
                   
            });
            
           
            
             $(".letters").on("click",".letter", function(){
                checkLetter($(this).attr("id"));
                 disableButton($(this));
                });
    
            function pickWord() {
                
                 var randomInt = Math.floor(Math.random() * words.length);
                // access word property of the array element
                 selectedWord = words[randomInt].word.toUpperCase();
                 selectedHint = words[randomInt].hint;
                 // console.log(selectedWord)
            }
            
             function createLetters() {
                for (var letter of alphabet) {
                    $("#letters").append("<button class='btn btn-success letter' id='" + letter + "'>" + letter + "</button>");
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
            
              // update the displayed booard
            function updateBoard() {
                $("#word").empty();
                
                for(var letter of board) {
                     document.getElementById("word").innerHTML += letter + " ";
                 }
                 
                 // to display the hint, we need to add it to the function that displays the board
                 $('#word').append("<br/>");
                  $("#hint").on("click",function(){
                       $('#clue').text('Hint: ' + selectedHint + '');
                        $("#hint").hide();
                  });
                
               
            }
            
            
             // update the current word then calls for a board update
            function updateWord(positions, letter) {
                for(var pos of positions) {
                    board = replaceAt(board,pos,letter);
                }
                updateBoard();
                
                 // Check to see if this is a winning guess
                if (!board.includes('_')) {
                     endGame(true);
                 }
            }
            
            // check to see if selcted letter exists in selectedWord
            function checkLetter(letter) {
                var positions = [];
                
                // put all the positions the letter exists in an array
                for(var i = 0; i < selectedWord.length; i++) {
                    console.log(selectedWord)
                    if(letter == selectedWord[i]){
                        positions.push(i);
                    }
                }
                
                // update game state
                if (positions.length > 0) {
                    updateWord(positions, letter);

                    
                } else {
                    remainingGuesses--;
                    updateMan();
                     //$('#hangImg').attr('src', 'img/stick_' + (6 - remainingGuesses) + '.png');

                
                    if (remainingGuesses <= 0) {
                        endGame(false);
                    }
                }
            }
            
             // clac and update img for stick man      
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
            
            // kicks off the game
            function startGame() {
                // append the letter buttons
                pickWord();
                createLetters();
                
                // Fill up the current guess word with underscores
                // and set the board
                initBoard();
                updateBoard();
               
            }
            
             // ends game by hiding game divs and displaying win or loss divs
            function endGame(win) {
                $("#letters").hide();
                
                if (win) {
                    $('#won').show();
                } else {
                    $('#lost').show();
                }
            }
            
            
            
           
            
           
            
            
            
           // disables the btn and changes style to show it's disabled
            function disableButton(btn) {
                btn.prop("disabled", true);
                btn.attr("class", "btn btn-danger")
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
       
            
    
           /* function updateImage() {
                
                //document.getElementById("man").innerHTML = "<img src='img/stick_5.png' >";
                $("img").attr("src","img/stick_3.png");
            }*/
            
           
          
          
             
    
       
         
            




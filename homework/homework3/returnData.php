<?php

function random_username($string) {
    $pattern = " ";
    $firstPart = strstr(strtolower($string), $pattern, true);
    $secondPart = substr(strstr(strtolower($string), $pattern, false), 0,3);
    $nrRand = rand(0, 100);
    
    $username = trim($firstPart).trim($secondPart).trim($nrRand);
    echo $username;
}


function checkIfSelected($option){
    if($option == $_POST['select']) {
        return 'selected';
    }
}
function ischecked($option)
{
      if($option == $_POST['product']) {
        return 'selected';
    }
    
}

function checked($option){
    
    if ($option == $_POST['choice']) {
            
            return "checked";
            
        }
}



function check1($option){
    if ($option == $_POST['choice1']) {
            
            return "checked";
            
        }
}

function check2($option){
    if ($option == $_POST['choice2']) {
            
            return "checked";
            
        }
}

function check3($option){
    if ($option == $_POST['choice3']) {
            
            return "checked";
            
        }
}

function check4($option){
    if ($option == $_POST['choice4']) {
            
            return "checked";
            
        }
}
?>

<!DOCTYPE htm1>
<html>
<head>
<meta charset="utf-8">
<title>Doc</title>
 <style>
            @import url("css/styles.css");
           
        </style>
</head>
<body>
    <form action="returnData.php" method="post" name="enterData">
<h1>Coffee Form</h1>
<label for="firstname">Firstname:</label> 

<input type="text" name="firstname" value="<?php if($_POST["firstname"]){echo $_POST["firstname"];}else if(empty($_POST["firstname"])){echo "";} ?>"><br>
<?php
if(empty($_POST['firstname'])){
echo "<h4>* You did not enter a firstname</h4>";}?>
<label for="lastname">Lastname:</label> 
<input type="text" name="lastname" value="<?php if($_POST["lastname"]){echo $_POST["lastname"];}else if(empty($_POST["lastname"])){echo "";} ?>"<br/>
<?php
if(empty($_POST['lastname'])){
echo "<h4>* You did not enter a lastname</h4>";}?>
<?php 
if(isset($_POST['firstname']) &&  isset($_POST['lastname'])){
$str = $_POST['firstname']." " . $_POST['lastname'];
echo $str;}
else{
    echo '<h4>* You must enter your name</h4>';
}
?>
<h3 id="username">Welcome: <?php

random_username($str); ?></h3>


       
            <br/>
               <fieldset>  
               <legend class="question">Where was coffee first discovered? </legend>
            <input id="turkey" type="radio" name="choice1" value="turkey" <?=check1('turkey')?>>
                <label for="turkey">Turkey</label> <br/>
                
                 <input id="Ethiopia" type="radio" name="choice1" value="Ethiopia" <?=check1('Ethiopia')?>>
                <label for="Ethiopia">Ethiopia</label> <br/>
                
                <input id="Columbia" type="radio" name="choice1" value="Columbia" <?=check1('Columbia')?>>
                <label for="Columbia">Columbia</label> <br/>
                
                <input id="brazil" type="radio" name="choice1" value="brazil" <?=check1('brazil')?>>
                <label for="brazil">Brazil</label>
            
        
            </fieldset>
            
                <?php
                if(empty($_POST['choice1'])) {
                    echo "<h4>*Please select a radio button</h4>";
                }
                else {
                if($_POST['choice1'] != 'Ethiopia') {
                    echo "The correct option was Ethiopia";
                }
                else{
                    echo "correct!";
                }
                }
                ?>

            <br/>    <br/>
             <fieldset> 
               <legend class="question">Which of these are the names of the most common types of coffee bean? </legend>
            <input id="ristretto-and-tactera" type="radio" name="choice2" value="ristretto-and-tactera" <?=check2('ristretto-and-tactera')?>>
                <label for="ristretto-and-tactera">Ristretto and Tactera</label> <br/>
                
                 <input id="arabica-and-robusta" type="radio" name="choice2" value="arabica-and-robusta" <?=check2('arabica-and-robusta')?>>
                <label for="arabica-and-robusta">Arabica and Robusta</label> <br/>
                
                <input id="liberica-and-acaisa" type="radio" name="choice2" value="liberica-and-acaisa" <?=check2('liberica-and-acaisa')?>>
                <label for="liberica-and-acaisa">Liberica and acaisa</label> <br/>
                
                <input id="laurina-and-topponta" type="radio" name="choice2" value="laurina-and-topponta" <?=check2('laurina-and-topponta')?>>
                <label for="laurina-and-topponta">Laurina and Topponta</label>
        
            </fieldset>
               
            <?php
                if(empty($_POST['choice2'])) {
                    echo "<h4>*Please select a radio button</h4>";
                }
                else {
                if($_POST['choice2'] != 'arabica-and-robusta') {
                    echo "The correct option was arabica and robusta";
                }
                else{
                    echo "correct!";
                }
                }
                ?>
                    <br/><br/>
         <fieldset> 
           <legend class="question">How do coffee beans grow? </legend>
            <input id="bush" type="radio" name="choice3" value="bush" <?=check3('bush')?>>
                <label for="bush">Bush</label> <br/>
                
                 <input id="vines" type="radio" name="choice3" value="vines" <?=check3('vines')?>>
                <label for="vines">Vines</label> <br/>
                
                <input id="trees" type="radio" name="choice3" value="trees" <?=check3('trees')?>>
                <label for="trees">Trees</label> <br/>
                
                <input id="roots" type="radio" name="choice3" value="roots" <?=check3('roots')?>>
                <label for="roots">Roots</label>
                
    
        
            </fieldset>
            
                <?php
                if(empty($_POST['choice3'])) {
                    echo "<h4>*Please select a radio button</h4>";
                }
                else {
                if($_POST['choice3'] != 'bush') {
                    echo "The correct option was bush";
                }
                else{
                    echo "correct!";
                }
                }
                ?>
           
                   <br/>    <br/>
            <fieldset>
            <legend class="question">How large is a shot of espresso? </legend>
            <input id="30ml" type="radio" name="choice4" value="30ml" <?=check4('30ml')?>>
                <label for="30ml">30ml</label> <br/>
                
                 <input id="35ml" type="radio" name="choice4" value="35ml" <?=check4('35ml')?>>
                <label for="35ml">35ml</label> <br/>
                
                <input id="37ml" type="radio" name="choice4" value="37ml" <?=check4('37ml')?>>
                <label for="37ml">37ml</label> <br/>
                
                <input id="40ml" type="radio" name="choice4" value="40ml" <?=check4('40ml')?>>
                <label for="40ml">40ml</label>
            </fieldset>
                <?php
                if(empty($_POST['choice4'])) {
                    echo "<h4>*Please select a radio button</h4>";
                }
                else{
                if($_POST['choice4'] != '30ml') {
                    echo "The correct option was 30ml";
                }
                else{
                    echo "correct!";
                }
                }
                ?>
                  <br/>    <br/>
            <?php
                               
                    $answer1 = $_POST['choice1'];
                    
                    $answer2 = $_POST['choice2'];
                    
                    $answer3 = $_POST['choice3'];
                    
                    $answer4 = $_POST['choice4'];
                    
                    
                    
                    
                    $totalCorrect = 0;
                    
                    if ($answer1 == "Ethiopia") { $totalCorrect++; }
                    
                    if ($answer2 == "arabica-and-robusta") { $totalCorrect++; }
                    
                    if ($answer3 == "bush") { $totalCorrect++; }
                    
                    if ($answer4 == "30ml") { $totalCorrect++; }
                    
                    
                    echo "<br/><div id='results'> Coffee Quiz Score: ". $totalCorrect ."/ 5 correct</div>";

            
            
            
            ?>
            
            
            
           
            <fieldset>
                 <legend>Select one preference: </legend>
                <input id="coffee" type="radio" name="choice" value="coffee" <?=checked('coffee')?>>
                <label for="coffee">Coffee</label>
                
                 <input id="expresso" type="radio" name="choice" value="expresso" <?=checked('expresso')?>>
                <label for="expresso">Expresso</label>
                
                <input id="latte" type="radio" name="choice" value="latte" <?=checked('latte')?>>
                <label for="latte">Latte</label>
                
                <input id="cappucino" type="radio" name="choice" value="cappucino" <?=checked('cappucino')?>>
                <label for="cappucino">Cappuccino</label>
                
                <input id="frappuccino" type="radio" name="choice" value="frappuccino" <?=checked('frappuccino')?>>
                <label for="frappuccino">Frappucino</label>
                
                <input id="instant" type="radio" name="choice" value="instant" <?=checked('instant')?>>
                <label for="instant">Instant</label>
                
                <input id="dairy-alternative" type="radio" name="choice" value="dairy-alternative" <?=checked('dairy-alternative')?>>
                <label for="dairy-alternative">Dairy Alternative</label>
            </fieldset>
            <?php echo (isset($_POST["choice"]))? "<p>".$_POST["choice"]."</p>": "<h4>* You did not select a radio button</h4>"; 
              
              
                  if(isset($_POST["choice"])){
                      $choice = $_POST["choice"];
                      
                  }
                  switch ($choice) {
                    case 'coffee':
                        echo "You are straightforward, minimalistic, and quiet.";
                        break;
                    case 'Expresso':
                        echo "You are diligent, strict, and reliable.";
                        break;
                    case 'latte':
                        echo "You are a trend follower, admirer of aesthetics, and friendly.";
                        break;
                    case 'cappucino':
                        echo "You are creative, introverted, and sometimes manipulative.";
                        break;
                     case 'frappuccino':
                        echo "You are adventurous, impulsive, and carefree.";
                        break;
                    case 'instant':
                        echo "You are optimistic, busy, and a procrasinator.";
                        break;
                     case 'dairy-alternative':
                        echo "You are detail-oriented, health/environmentally conscious, and high-maintenance.";
                        break;
                      
                      default:
                         echo "<h4>* Select a valid option</h4>";
                          break;
                  }
          ?>
            </fieldset>
            <br/>
            <label for="birthmonth">Choose your month of birth</label>
                <select id="month" name="select">
                    <option value=""> - Select one - </option>
                    <option <?=checkIfSelected('1')?> value="1">January</option>
                    <option <?=checkIfSelected('2')?> value="2">February</option>
                    <option <?=checkIfSelected('3')?> value="3">March</option>
                    <option <?=checkIfSelected('4')?> value="4">April</option>
                    <option <?=checkIfSelected('5')?> value="5">May</option>
                    <option <?=checkIfSelected('6')?> value="6">June</option>
                    <option <?=checkIfSelected('7')?> value="7">July</option>
                    <option <?=checkIfSelected('8')?> value="8">August</option>
                    <option <?=checkIfSelected('9')?> value="9">September</option>
                    <option <?=checkIfSelected('10')?> value="10">October</option>
                    <option <?=checkIfSelected('11')?> value="11">November</option>
                    <option <?=checkIfSelected('12')?> value="12">December</option>
                    </select>
                    <br/>
                
               
                
              
    

<?php
if(!empty($_POST['select'])){
 $arr = array( 1 => "Green Tea Latte",2=>"Nitro Cold Brew",3=>"Mocha",4=>"Irish Coffee",5=>"Iced Coffe",6=>"Iced Caramel Mocchiato",7=>" Mocha Frappicino",8=>"Vanilla Latte",9=>"Dark Roast",10=>"Pumpkin Spice Latte",11=>"Gingerbread Latte",12=>"Peppermint Latte");
$month = $_POST["select"];
echo "Based on your birth month, we reccomend a ".$arr[$month]."!";
echo  '<br/><div class ="out"><img src="img/pic' . $month . '.png" width="150" ><div class="middle">
    <div class="text">Enjoy</div></div>';
}
else{
    echo '<h4>* Select a month</h4>';
}
    

?>

</body>
</html>


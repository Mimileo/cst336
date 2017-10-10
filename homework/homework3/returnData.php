<?php

function random_username($string) {
    $pattern = " ";
    $firstPart = strstr(strtolower($string), $pattern, true);
    $secondPart = substr(strstr(strtolower($string), $pattern, false), 0,3);
    $nrRand = rand(0, 100);
    
    $username = trim($firstPart).trim($secondPart).trim($nrRand);
    return $username;
}

function checked($option){
    
    if ($option == $_POST['choice']) {
            
            return "checked";
            
        }
}



function checkIfSelected($option){
    if ($option == $_POST['select']) {
            
            return "selected";
            
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

<label for="username">Username:</label> 
<input type="text" name="userTxt"><br>
<p>Welcome: <?php if($_POST["userTxt"]){echo $_POST["userTxt"];}else if(empty($_POST["userTxt"])){echo "<h4>* You did not enter a username</h4>";} ?></p>
<label for="password">Password:</label> 
<input type="text" name="password"><br/>
<p><?php echo (isset($_POST["password"]))?  $_POST["password"]: "<h4>* You did not enter a name</h4>"; ?></p>

 <label for="name">Name:</label>
<input id="name" type="text" name="textfield"/><br/>
<p><?php echo (isset($_POST["name"]))?  $_POST["name"]: "<h4>* You did not enter a name</h4>"; ?></p>
         <fieldset>
                <legend> Select type of product you are looking for: </legend>
                <input id="electronics" type="checkbox" name="electronics" value="electronics" <?php echo (isset($_POST['electronics']) && !empty($_POST['electronics'])) ? "checked" : ""; ?> >
                <label for="electronics">Electronics</label><br/>
                
                
                <input id="coffee" type="checkbox" name="coffee" value="coffee" <?php echo (isset($_POST['coffee']))? "checked": ""; ?>>
                <label for="coffee">Coffee</label><br/>
                
                 <input id="vegan yogurt" type="checkbox" name="vegan yogurt" value="vegan yogurt" <?php echo (isset($_POST['vegan yogurt']))? "checked": ""; ?>>
                <label for="vegan yogurt">Vegan yogurt</label><br/><br/>
                <?php if(isset($_POST["product"])){  
                foreach($_POST["product"] as $value){
                    echo "<p>".$value . "</p>";
                    } 
                }else{ 
                echo "<h4>* You did not mark a checkbox</h4>";
                } ?>
            </fieldset>
            
            
            <p>Select one preference: </p>
            <fieldset>
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
                          echo "error";
                          break;
                  }
          ?>
            </fieldset>
            
            <label for="birthmonth">Choose your month of birth</label>
                <select id="month" name="select">
                    <option <?=checkIfSelected('1')?> value="1">January</option>
                    <option <?=checkIfSelected('2')?> value="2">Februaryk</option>
                    <option <?=checkIfSelected('3')?> value="3">March</option>
                    <option <?=checkIfSelected('4')?> value="4">April</option>
                    <option <?=checkIfSelected('5')?> value="5">May</option>
                    <option <?=checkIfSelected('6')?> value="6">June</option>
                    <option <?=checkIfSelected('7')?> value="7">July</option>
                    <option <?=checkIfSelected('8')?> value="8">August</option>
                    <option <?=checkIfSelected('9')?> value="9">September</option>
                    <option <?=checkIfSelected('10')?> value="10">October</option>
                    <option <?=checkIfSelected('11')?> value="11">November</option>
                    <option <?=checkIfSelected('12')?> value="12">December</option> <br/>
                <?php 
               
              
                
               // else if(isset($_POST["select"])) {
                 //   $month=$_POST["select"];
                  if(empty($_POST['select']))
                {
                echo "<h4>* You did not select a month</h4>";
                    
                }
                 
                else{
                   echo "<p>".$_POST['select']."</p>";  
                   
               }


                   // for($i = 0; $i < count($arr);$i++){
                     //   if($i+1 == $_POST["select"] ){
                       //     $num = $i+1;
                         //   echo "<img src='img/pic".$num.".png' width='70'><br>";
                    //    }
                //    }    
            //    }
                
                ?>
            <br/>
<label for="address">Enter your favorite word:</label><br/>
<textarea id="address" name="word"></textarea>
 <?php echo (isset($_POST["word"]))?  $_POST["word"]: "<h4>* You did not select a radio button</h4>"; ?>
</form>


<p>The password you enetered was: <?php echo $_POST["password"]; ?></p>

<p> <?php echo $_POST["name"]; ?><p>
    
<p> <?php 
foreach($_POST["product"] as $selected){
echo $selected."</br>";
} ?><p>
    
<p><?php echo $_POST["color"]?> </p>  

<?php
 $arr = array( 1 => "Green Tea Latte",2=>"Nitro Cold Brew",3=>"Mocha",4=>"Irish Coffee",5=>"Iced Coffe",6=>"Iced Caramel Mocchiato",7=>" Mocha Frappicino",8=>"Vanilla Latte",9=>"Dark Roast",10=>"Pumpkin Spice Latte",11=>"Gingerbread Latte",12=>"Peppermint Latte");
$month = $_POST["select"];
 echo "<p>".$month ."</p>";  
echo "Based on your birth month, we reccomend a ".$arr[$month];
echo  '<br/><img src="img/pic' . $month . '.png" width="150" >';
    

?>
<p><?php echo $_POST["word"]?> </p> 

</body>
</html>


<?php


if($_GET['formSubmit'] == "Submit")

{

   $text = $_GET['textfield'];

   $product = $_GET['product'];

   $color = $_GET['color'];

   $errorMessage = "";

 

   
}





?>


<!DOCTYPE html>
<html>
    <head>
        <title> Homework 3 </title>
        <meta charset="utf-8">
         <style>
            @import url("css/styles.css");
           
        </style>
    </head>
    <body>


<form action="returnData.php" method="post" name="enterData">
<h1>Coffee Form</h1>
<label for="firstname">Firstname:</label> 
<input type="text" name="firstname"><br>
<label for="lastname">Lastname:</label> 
<input type="text" name="lastname"><br>


           <br/>
            <fieldset>
               <legend class="question">Where was coffee first discovered? </legend>
            <input id="turkey" type="radio" name="choice1" value="turkey" >
                <label for="turkey">Turkey</label><br/>
                
                 <input id="Ethiopia" type="radio" name="choice1" value="Ethiopia">
                <label for="Ethiopia">Ethiopia</label><br/>
                
                <input id="Columbia" type="radio" name="choice1" value="Columbia" >
                <label for="Columbia">Columbia</label><br/>
                
                <input id="brazil" type="radio" name="choice1" value="brazil">
                <label for="brazil">Brazil</label>
            </fieldset>
            <br/>
            <fieldset>
               <legend class="question">Which of these are the names of the most common types of coffee bean? </legend>
                <input id="ristretto-and-tactera" type="radio" name="choice2" value="ristretto-and-tactera" >
                <label for="ristretto-and-tactera">Ristretto and Tractera</label><br/>
                
                 <input id="arabica-and-robusta" type="radio" name="choice2" value="arabica-and-robusta">
                <label for="arabica-and-robusta">Arabica and Robusta</label><br/>
                
                <input id="liberica-and-acaisa" type="radio" name="choice2" value="liberica-and-acaisa" >
                <label for="liberica-and-acaisa">Liberica and acaisa</label><br/>
                
                <input id="laurina-and-topponta" type="radio" name="choice2" value="laurina-and-topponta">
                <label for="laurina-and-topponta">Laurina and Topponta</label>
            </fieldset>
            <br/>
            <fieldset>
            <legend class="question">How do coffee beans grow? </legend>
                <input id="bush" type="radio" name="choice3" value="bush" >
                <label for="bush">Bush</label><br/>
                
                 <input id="vines" type="radio" name="choice3" value="vines">
                <label for="vines">Vines</label><br/>
                
                <input id="trees" type="radio" name="choice3" value="trees" >
                <label for="trees">Trees</label><br/>
                
                <input id="roots" type="radio" name="choice3" value="roots">
                <label for="roots">Roots</label><br/>
            </fieldset>
            <br/>
            <fieldset>
            <legend class="question">How large is a shot of espresso? </legend>
                <input id="30ml" type="radio" name="choice4" value="30ml" >
                <label for="30ml">30ml</label><br/>
                
                 <input id="35ml" type="radio" name="choice4" value="35ml">
                <label for="35ml">35ml</label><br/>
                
                <input id="37ml" type="radio" name="choice4" value="37ml" >
                <label for="37ml">37ml</label><br/>
                
                <input id="40ml" type="radio" name="choice4" value="40ml">
                <label for="40ml">40ml</label>
            </fieldset>
            
            <br/>

              <fieldset>
                 <legend>Select one preference: </legend>
                <input id="coffee" type="radio" name="choice" value="coffee" >
                <label for="coffee">Coffee</label>
                
                 <input id="expresso" type="radio" name="choice" value="expresso" >
                <label for="expresso">Expresso</label>
                
                <input id="latte" type="radio" name="choice" value="latte">
                <label for="latte">Latte</label>
                
                <input id="cappucino" type="radio" name="choice" value="cappucino">
                <label for="cappucino">Cappuccino</label>
                
                <input id="frappuccino" type="radio" name="choice" value="frappuccino" >
                <label for="frappuccino">Frappucino</label>
                
                <input id="instant" type="radio" name="choice" value="instant">
                <label for="instant">Instant</label>
                
                <input id="dairy-alternative" type="radio" name="choice" value="dairy-alternative" >
                <label for="dairy-alternative">Dairy Alternative</label>
            </fieldset>
            
             <label for="birthmonth">Choose your month of birth: </label>
                <select id="month" name="select">
                    <option value=""> - Select one - </option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
              
            <br/>


<button>Submit</button>
	

</form>
<img src="img/buddy_verified.png" alt="buddy verified" width ="90">

       
        
    </body>
</html>
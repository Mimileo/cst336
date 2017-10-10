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

<h2>Assignment 3</h2>
<form action="returnData.php" method="post" name="enterData">

<label for="username">Username:</label> 
<input type="text" name="userTxt"><br>
<label for="password">Password:</label> 
<input type="text" name="password"><br>

 <label for="name">Name:</label>
<input id="name" type="text" name="name"/>

         <fieldset>
                <legend> Select type of product you are looking for: </legend>
                <input id="electronics" type="checkbox" name="product[]" value="electronics">
                <label for="electronics">Electronics</label><br/>
                
                <input id="coffee" type="checkbox" name="product[]" value="coffe">
                <label for="coffee">Coffee</label><br/>
                
                 <input id="vegan yogurt" type="checkbox" name="product[]" value="vegan yogurt">
                <label for="vegan yogurt">Vegan yogurt</label><br>
            </fieldset>
            
            <p>Select one preference: </p>
            <input id="coffee" type="radio" name="choice" value="coffee" >
                <label for="coffee">Coffee</label>
                
                 <input id="expresso" type="radio" name="choice" value="expresso">
                <label for="expresso">Expresso</label>
                
                <input id="latte" type="radio" name="choice" value="latte" >
                <label for="latte">Latte</label>
                
                <input id="cappucino" type="radio" name="choice" value="cappucino">
                <label for="cappucino">Cappuccino</label>
                
                <input id="frappuccino" type="radio" name="choice" value="frappuccino" >
                <label for="frappuccino">Frappucino</label>
                
                <input id="instant" type="radio" name="choice" value="instant" >
                <label for="instant">Instant</label>
                
                <input id="dairy-alternative" type="radio" name="choice" value="dairy-alternative" >
                <label for="dairy-alternative">Dairy Alternative</label>
        
            </fieldset>
            
             <label for="birthmonth">Choose your month of birth</label>
                <select id="month" name="select">
                    <option value="1">January</option>
                    <option value="2">Februaryk</option>
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
<label for="address">Enter your favorite word:</label><br>
<textarea id="address" name="word"></textarea>

<input type="submit">
	

</form>


        
        <!--<form action="index.php" method="post" name="enterData">
            <label for="name">Name:</label>
            <input id="name" type="text" name="textfield"/>
            
            <fieldset>
                <legend> Select type of product you are looking for: </legend>
                <input id="electronics" type="checkbox" name="product" value="electronics">
                <label for="electronics">Electronics</label><br/>
                
                <input id="coffee" type="checkbox" name="product" value="coffe">
                <label for="coffee">Coffee</label><br/>
                
                 <input id="vegan yogurt" type="checkbox" name="product" value="vegan yogurt">
                <label for="vegan yogurt">Vegan yogurt</label><br>
            </fieldset>
            
            <fieldset>
              
                <label for="yellow">Yellow</label>
        
            </fieldset>
            
            
            <label for="favcity">Choose your favorite city?</label>
                <select id="favcity" name="select">
                    <option value="1">Amsterdam</option>
                    <option value="2">Buenos Aires</option>
                    <option value="3">Delhi</option>
                    <option value="4">Hong Kong</option>
                    <option value="5">London</option>
                    <option value="6">Los Angeles</option>
                    <option value="7">Moscow</option>
                    <option value="8">Mumbai</option>
                    <option value="9">New York</option>
                    <option value="10">Sao Paulo</option>
                    <option value="11">Tokyo</option>
                </select>
                
        <input type="submit" name="formsubmit" value="Submit"/>
        
        </form>-->
        
    </body>
</html>
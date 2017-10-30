<?php

session_start();


  


$letters = range('A','Z');
//print_r($letters);

function dropdown(){
    global $letters;
    for($i=0;$i<26;$i++){
        echo "<option>".$letters[$i]."</option>";
    }
}

function fillTable($size, $find, $omit){
    global $letters;
    $i=0;
   
    $table=array();
    $toFind=0;
    $toOmit=0;
  
   for($i=0;$i<$size*$size;$i++){
       //$randL = chr(rand(65,90));
            do{
                $num = $letters[array_rand($letters)];
                //$num = $letters[rand(0,$size)];
                
            }while($num == $find || $num==$omit );
            $table[]=$num;
        }

        
      
    
      $table[array_rand($table)] = $find; 
     // print_r($table);
     return $table;

}

 

function display(){
    global $letterstofind;
    if(isset($_GET['submit'])){
        $size=$_GET['size'];
        $find=$_GET['find'];
        $omit=$_GET['omit'];
       
    
    



        
        if($find == $omit){
            echo "error letter to find can't equal omit";
            return;
        }
    else{
    echo "Find the letter: " .$find."</br>";
    echo $size;
    echo "Letter to omit:".$omit."</br>";
    $_SESSION['find'][] = $_GET['find'];
    }
     
    $fill = fillTable($size,$find,$omit);
    
    echo"<table style='margin:0 auto;width:50%;border:1px solid black;background-color:gray;'><tr>";
    
 
        $index=0;
        for($j=0;$j<$size;$j++){
                echo "<tr>";
           for($i=0;$i<$size;$i++){
               $val=$fill[$index];
               if($val < 'H'){
                   $color ="red";
               }
               else if ($val <'P'){
               $color="blue";
               }
               else if($val >= 'P'){
               $color="green";
               }
                 echo "<td style='color:$color';>". $fill[$index]."</td>";
                  $index++;        
        
              }
            echo "<tr>";
          }
    
         echo"</table>";
        
        }
      if (isset($_GET['clear'])){
          // remove all session variables
            session_unset(); 
            
            // destroy the session 
            session_destroy(); 
      } 
        
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h2 style="color:red;text-align:center;font-size:2em;">Letter to find</h2>
        <form method="get">
        <select name="find">
            <?=dropdown()?>
            
        </select>
        <br/>
         <h2 style="font-family:Arial;">Table Size</h2>
          <select name="size">
            <option value="6">6x6</option>
            <option value="7">7x7</option>
            <option value="8">8x8</option>
            <option value="9">9x9</option>
            <option value="10">10x10</option>
          
            
        </select>
         <br/>
 <h2>Letter to omit</h2>
        <select name="omit">
            <?=dropdown()?>
            
        </select>
        <br/>
        <h2>Table</h2>
        <?=display()?>
        <br/>
         
         <input  type="submit" name="submit" value="Create Table"/><br/>
         <input  type="submit" name="clear" value="Clear History"/><br/>
         <h3>Letter to find history</h3>
          <?php //print_r($_SESSION);
          
          if(isset($_SESSION['find'])){
          foreach ($_SESSION['find'] as $name => $value)
            {
                echo $value." ";
            }
          }
          ?>
        </form>
        
      
       
         
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:blue">
      <td>1</td>
      <td>The page includes the basic form elements as in the Program Sample: Dropdown menus, radio buttons, submit button</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:blue">
      <td>2</td>
      <td>When submitting the form, a "Find the Letter x" header is displayed, where "x" is the letter selected by the user</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:blue">
      <td>3</td>
      <td>When submitting the form, a "Letter to Omit: x" message is displayed, where "x" is the letter to omit, selected by the user</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:blue">
      <td>4</td>
      <td>When submitting the form, a table is created and filled with random letters</td>
      <td align="center">5</td>
    </tr>  
    <tr style="background-color:blue">
      <td>5</td>
      <td>The size of the table corresponds to the one selected by the user </td>
      <td align="center">5</td>
    </tr>  
     <tr style="background-color:blue">
       <td>6</td>
       <td>The letter selected by the user is shown only once</td>
       <td align="center">10</td>
     </tr> 
     <tr style="background-color:blue">
       <td>7</td>
       <td>The letter to omit is not shown in the table</td>
       <td align="center">10</td>
     </tr>      
      <tr style="background-color:blue">
       <td>8</td>
       <td>An error message must be displayed if the "letter to find" and "letter to omit" are the same</td>
       <td align="center">5</td>
     </tr> 
      <tr style="background-color:blue">
       <td>9</td>
       <td>The letters are shown in the right colors: red, blue, and green </td>
       <td align="center">5</td>
     </tr>
      <tr style="background-color:blue">
       <td>10</td>
       <td>The history of the letters to be found is listed at the bottom</td>
       <td align="center">10</td>
     </tr>
      <tr style="background-color:blue">
       <td>11</td>
       <td>Users are able to clear the history of letters to find when clicking on a "Clear History" button.</td>
       <td align="center">5</td>
     </tr>             
      <tr style="background-color:blue">
       <td>12</td>
       <td>At least five CSS rules are included</td>
       <td align="center">5</td>
     </tr>           
     <tr style="background-color:blue">
      <td>13</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>

    </body>
</html>
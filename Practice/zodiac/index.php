<?php
  
  
function yearList($start,$end,$interval){
    
     if (isset($_GET['start'])) {
        
        $start= $_GET['start'];
    }
    
    
      $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

    $counter=0;
    $yearsum = 0;
    for($i=$start;$i<=$end;$i+=$interval){
        $yearsum+=$i;
        echo "<li> Year:  $i ";
        if ($i == 1776)
        echo "INDEPENDENCE DAY";
        
        if($i >= 1900){
           
           // echo "<img src= img/$zodiac[$animal].png ";
            echo "<br><img src= 'img/".$zodiac[$counter%count($zodiac)].".png' ";
            $counter++;
            
            
        }
       
       
        if($i%100 == 0)
            echo "HAPPY NEW CENTURY!";
         echo"</li><br/>";
          if($animal > 11){
            $animal=0;
        }
    }
    return $yearsum;
}

/*function yearList($start,$end){
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
   

    $yearsum=0;
     for($i=$start;$i<=$end;$i++){
         $yearsum += $i;
         $c=0;
         
        echo "<li> Year ". $i . " " ;
        if ($i == 1776)
             echo "USA INDEPENDENCE";
         
        if($i%100 == 0) 
             echo "Happy New Century";
             
       if ($i >=1900){
            echo "<img src='img/".$zodiac[$c % count($zodiac)].".png' width='100'>"; 
            $c+=1;
       }
         
        echo "</li>";
    }
    return $yearsum;
}*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Practice: Chinese Zodiac Years </title>
        <meta charset="utf-8"/>
        
    </head>
    <body>
        <h1>Chinese Zodiac List</h1>
        <ul>
            <?php 
          
            
              $sum = yearList(1900,2000,1);
            echo $sum;
           /* for($i=1500;$i<=2000;$i++){
                echo "<li> Year ". $i . " </li>";
            }*/
            
            ?>
            
            
            
            
        </ul>
    </body>
</html>
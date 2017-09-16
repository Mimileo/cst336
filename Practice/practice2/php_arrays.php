<?php
function displaySymbol($symbol) {
   // echo "<img src='../labs/lab2/img/$symbol.png' width='70'/>";
   echo "<img src='img/$symbol.png' width='70'/>";
}

$symbols = array("lemon", "orange", "cherry");
//print_r($symbols); // dispaly array contents, only for debugginmg

echo $symbols[0]; // display first element of array
//displaySymbol($symbols[2]);
$symbols[] ="grapes"; // adds element at end of array

//$symbols[2] = "seven"; // replace value
array_push($symbols, "seven"); //adds elemnt at end of array
//displaySymbol($symbols[4]);

for ($i=0;$i < count($symbols);$i++) {
    displaySymbol($Symbols[$i]);
}

sort($symbols); // sorts in ascending order
print_r($symbols);
shuffle($symbols);
echo "<h2>";
print_r($symbols);
$lastSym = array_pop($symbols); // retrieve and remove last element in array

foreach($symbols as $s) {
    displaySymbol($s);
}
unset($symbols[2]); // deletes element in array
echo "<hr>";
$symbols = array_values($symbols); //reindexes the array
echo "<hr>";
print_r($symbols);

// display rand symbol
displaySymbol($symbols[rand(0, count($symbols))]);
displaySymbol($symbols[array_rand($symbols)]);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP Arrays </title>
    </head>
    <body>

    </body>
</html>
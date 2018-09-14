<?php


include 'dbconnection.php';
$conn = getDatabaseConnection();
$searchName = $_GET['value'];


if(isset($searchName)) {
$sql = "INSERT INTO weather
        ( location, time)
        VALUES
        ( :search, CURRENT_TIMESTAMP())";
        
        $namedParameters = array();
        $namedParameters[':search'] = $searchName;
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        
        echo "Searched city  and  time  added.<br/>";


$sql = "SELECT COUNT(*)
            AS Rows, location
            From weather
            WHERE location = :search";
        
        $namedParameters = array();
        $namedParameters[':search'] = $searchName;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $count = $stmt->fetch();
       
        echo "<br/><h5 class='h6-responsive' style='letter-spacing: 1px'>  The keyword '<i>" . $searchName ."</i>' has been searched<br/> <b>" . $count[0] . "</b> time(s)</h5><br/>";
        echo "<h5 class='h5-responsive font-weight-bold'>Search History </h5>";
        
    
$sql = "SELECT *
        FROM weather 
        WHERE location = :search";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll();
        foreach($records as $results){
            $weatherDate = $results['time'];
            $dt = new DateTime($weatherDate, new DateTimeZone('UTC'));


            $dt->setTimezone(new DateTimeZone('America/Los_Angeles'));


            $date = $dt->format('M&\nb\sp;j,&\nb\sp;Y  &\nb\sp;&\nb\sp;&\nb\sp;    g:ia  ');
            //setTimezone(new DateTimeZone('America/Los_Angeles'));
            echo $date . "<br/>";
        }




}
     /*   
$sql = "INSERT INTO weather
        (location, time)
        VALUES
        (:search, CURRENT_TIMESTAMP())";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);  
*/
?>
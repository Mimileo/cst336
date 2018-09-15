

<?php
/*
function getDatabaseConnection($dbname = 'heroku_b044cfd7d742548'){
    
    $host = 'us-cdbr-iron-east-05.cleardb.net';//cloud 9
    $dbname = 'heroku_b044cfd7d742548';
    $username = 'b49cfc97f06ae5';
    $password = 'a06a9be3';
    $host = 'localhost';//cloud 9
    $dbname = 'vg';
    $username = 'root';
    $password = '';
    
    //using different database variables in Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     return $dbConn;
    
}
*/
?>
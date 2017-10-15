

<?php
function getDatabaseConnection(){
    $host = 'localhost';//cloud 9
    $dbname = 'tcp';
    $username = 'root';
    $password = '';

  
    //using different database variables in Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("mysql://b49cfc97f06ae5:a06a9be3@us-cdbr-iron-east-05.cleardb.net/heroku_b044cfd7d742548?reconnect=true"));
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


?>
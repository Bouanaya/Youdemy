<?php 
class Database{
private static $userHost='root';
private static $serverHost='localhost';
private static $password='';
private static $db='youdemy';
private static  $conn;
static function connect(){
if(self::$conn) {
    return self::$conn;
    
    
} else  {
    //throw $th;
    $dsn="mysql:host=".self::$serverHost.";dbname=".self::$db;
    $connect=self::$conn=new PDO($dsn,self::$userHost,self::$password);
    return $connect; 
}

}
}



 
var_dump( Database::connect() );
?>
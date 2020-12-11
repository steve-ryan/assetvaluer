<?php
$server = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'assetvaluer';

//database connection

$db = new mysqli($server,$username,$password,$database);

//check connection

if ($db->connect_error) {
    die("<p>Database <b><i>$database</i></b> couldn't found</p> " . $db->connect_error);
}


?>
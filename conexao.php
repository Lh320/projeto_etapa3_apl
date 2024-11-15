<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'formulario_db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn) {
    echo "foi";
} else{
    echo "não foi";
}
?>

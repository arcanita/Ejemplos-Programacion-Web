<?php

$dbhost = 'localhost';
$dbuser = 'lunakali77';
$dbpass = '9W4MaqnKNW20U2d';
$db = 'lunakali_principal';


$link = mysqli_connect($dbhost,$dbuser,$dbpass,$db) or die("Error " . mysqli_error($link)); 

if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}
?>
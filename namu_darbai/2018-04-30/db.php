<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.30
 * Time: 18:48
 */

//Prisijungimas prie db
$servername = 'localhost';
$db = 'auto';
$username = 'auto';
$password = 'test';

// sukuriam prisijungimą

$connection = new mysqli($servername,$username, $password, $db);

//tikrinam ar prisijungimas pavyko

if ($connection->connect_error){
    die ('Nepavyko prisijungti: ' . $connection->connect_error);
}
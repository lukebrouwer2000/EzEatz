<?php
$serverEndpoint = 'eedb.cjezeavsieu7.us-west-1.rds.amazonaws.com';
$serverUsername = 'bernieisgone';
$serverPassword = 'ripdeliverabletwo';
$dbName = 'TestSchema';


$mysqli = new mysqli($serverEndpoint, $serverUsername, $serverPassword, $dbName, 3306);

if ($mysqli->connect_errno){
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}





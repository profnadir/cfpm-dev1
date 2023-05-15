<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'cfpm_dev1_db';

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //traitement
    $sql = "create table stagiaires(
        ID  int unsigned AUTO_INCREMENT PRIMARY KEY,
        nom varchar(50) not null,
        prenom varchar(50) not null,
        email varchar(150)
    )";
    $conn->exec($sql);

    echo "table created";

}
catch(PDOException $ex){
    echo 'Error : ' . $ex->getMessage();
}

$conn = null;
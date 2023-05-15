<?php

// connexion DB
// remove info from DB
// redirection

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'cfpm_dev1_db';

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'];

    //traitement
    $sql = "delete from stagiaires
            where ID = $id
            ";

    $conn->exec($sql);

    echo "stagiaire deleted";
    header("Location: index.php");
    exit;

}
catch(PDOException $ex){
    echo 'Error : ' . $ex->getMessage();
}

$conn = null;

<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
// connexion DB
// validation des inputs
// update info
// redirection

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'cfpm_dev1_db';

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $id = $_GET['id'];

    // TODO : Validation

    //traitement
    $sql = "update stagiaires set 
            nom = '$nom',
            prenom = '$prenom',
            email = '$email'
            where ID = $id
            ";

    $conn->exec($sql);

    echo "stagiaire updated";
    header("Location: index.php");
    exit;

}
catch(PDOException $ex){
    echo 'Error : ' . $ex->getMessage();
}

$conn = null;
}
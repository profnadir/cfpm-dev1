<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    // connexion DB
// validation des inputs
// save info
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

    // TODO : Validation

    //traitement
    $sql = "insert into stagiaires(nom,prenom,email) 
        values('$nom','$prenom','$email')";

    $conn->exec($sql);

    echo "stagiaire created";
    header("Location: index.php");
    exit;

}
catch(PDOException $ex){
    echo 'Error : ' . $ex->getMessage();
}

$conn = null;
}
<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=restôt;charset=utf8;','root',"");

$client = $bdd->prepare("SELECT * FROM clients WHERE mail=? AND mdp=?");
$client->execute([$_SESSION['mail'], $_SESSION['mdp']]);

$lastName = '';
$fistName = '';
$email = '';
$tel = '';

while ($row = $client->fetch(PDO::FETCH_ASSOC)) {
    $lastName = $row['nom'];
    $fistName = $row['prenom'];
    $email = $row['mail'];
    $tel = $row['numero'];
}

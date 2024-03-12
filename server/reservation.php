<?php
session_start();
if (!isset($_SESSION['mail']) || !isset($_SESSION['mdp'])) {
    header('Location: inscription.php');
    exit();
}

$bdd = new PDO('mysql:host=localhost;dbname=restôt;charset=utf8;','root',"");

$client = $bdd->prepare("SELECT * FROM clients WHERE mail=? AND mdp=?");
$client->execute([$_SESSION['mail'], $_SESSION['mdp']]);

$lastName = '';
$firstName = '';
$idClient = '';
$resto = '';

while ($row = $client->fetch(PDO::FETCH_ASSOC)) {
    $lastName = $row['nom'];
    $firstName = $row['prenom'];
    $idClient = $row['id'];
}

if (isset($_POST['reservationTavolaFelice'])) {
    addReservation($bdd, 'LaTavolaFelice', $idClient);
}

if (isset($_POST['reservationFoliePapilles'])) {
    addReservation($bdd, 'LaFoliedesPapilles', $idClient);
}

if (isset($_POST['reservationRevePanda'])) {
    addReservation($bdd, 'LeRêveduPanda', $idClient);
}

if (isset($_POST['reservationMariachiGrill'])) {
    addReservation($bdd, 'MariachiGrill', $idClient);
}

function addReservation($bdd, $resto, $idClient)
{
    $day = $_POST['jour'];
    $hour = $_POST['heure'];
    $nbrPersonne = $_POST['nbrPersonnes'];

    $idQuery = $bdd->prepare("SELECT id FROM restaurants WHERE nom=?");
    $idQuery->execute([$resto]);
    $idResto = $idQuery->fetchColumn();

    $reservation = $bdd->prepare("INSERT INTO réservations(jour, heure, nbr_personnes, id_client, id_restaurant) VALUES (?,?,?,?,?)");
    $reservation->execute([$day, $hour, $nbrPersonne, $idClient, $idResto]);
}
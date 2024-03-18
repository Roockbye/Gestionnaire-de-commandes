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
$isReserver = '';

while ($row = $client->fetch(PDO::FETCH_ASSOC)) {
    $lastName = $row['nom'];
    $firstName = $row['prenom'];
    $idClient = $row['id'];
}



if (isset($_POST['reservationTavolaFelice'])) {
    addReservation($bdd,'LaTavolaFelice' , $idClient, $isReserver);
}

if (isset($_POST['reservationFoliePapilles'])) {
    addReservation($bdd, 'LaFoliedesPapilles', $idClient, $isReserver);
}

if (isset($_POST['reservationRevePanda'])) {
    addReservation($bdd, 'LeRêveduPanda', $idClient, $isReserver);
}

if (isset($_POST['reservationMariachiGrill'])) {
    addReservation($bdd, 'MariachiGrill', $idClient, $isReserver);
}

function addReservation($bdd, $resto, $idClient, $isReserver)
{
    $day = $_POST['jour'];
    $hour = $_POST['heure'];
    $nbrPersonne = $_POST['nbrPersonnes'];
    $idResto = 0;
    $nbrTotalTables = 0;

    $restaurant = $bdd->prepare("SELECT * FROM restaurants WHERE nom=?");
    $restaurant->execute([$resto]);

    while ($row = $restaurant->fetch(PDO::FETCH_ASSOC)) {
        $idResto = $row['id'];
        $nbrTotalTables = $row['nbr_tables'];
    }

    if (check($bdd, $idResto, $nbrTotalTables, $day, $hour)) {
        $reservation = $bdd->prepare("INSERT INTO réservations(jour, heure, nbr_personnes, id_client, id_restaurant, heure_reservation) VALUES (?,?,?,?,?,?)");
        $heure_reservation = date('Y-m-d H:i:s');
        $reservation->execute([$day, $hour, $nbrPersonne, $idClient, $idResto, $heure_reservation]);
        $isReserver ='Votre réservation pour ' . $resto .  ' a bien été enregistré !';
    }
}

function check($bdd, $idResto, $nbrTables, $day, $hour)
{
    $reservations = $bdd->prepare("SELECT * FROM réservations WHERE id_restaurant=? AND jour=?");
    $reservations->execute([$idResto, $day]);

    $tableMidi = 0;
    $tableSoir = 0;
    while ($row = $reservations->fetch(PDO::FETCH_ASSOC)) {
        if ($row['heure'] >= 11 && $row['heure'] <= 15) {
            $tableMidi++;
        } else if ($row['heure'] >= 18 && $row['heure'] <= 21) {
            $tableSoir++;
        }
    }

    if ($hour >= 11 && $hour <= 15 && $tableMidi < $nbrTables) {
        return true;
    } else if ($hour >= 18 && $hour <= 21 && $tableSoir < $nbrTables) {
        return true;
    } else {
        return false; // Plus de place ni pour le midi ni pour le soir
    }
}

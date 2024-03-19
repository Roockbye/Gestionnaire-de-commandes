<?php
session_start();
if (!isset($_SESSION['mail'])) {
    header('Location: inscription.php');
}

$bdd = new PDO('mysql:host=localhost;dbname=restôt;charset=utf8;','root',"");

$client = $bdd->prepare("SELECT * FROM clients WHERE mail=? AND mdp=?");
$client->execute([$_SESSION['mail'], $_SESSION['mdp']]);

$lastName = '';
$firstName = '';
$email = '';
$tel = '';
$idClient = '';
$isUpdate = '';

while ($row = $client->fetch(PDO::FETCH_ASSOC)) {
    $lastName = $row['nom'];
    $firstName = $row['prenom'];
    $email = $row['mail'];
    $tel = $row['numero'];
    $idClient = $row['id'];
}

if (isset($_POST['updateClient'])) {
    $lastName = $_POST['nom'];
    $firstName = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];


    $update = $bdd->prepare("UPDATE clients SET nom=?, prenom=?, mail=?, numero=? WHERE id=?");
    $update->execute([$lastName, $firstName, $email, $tel, $idClient]);
}

if (isset($_POST['updatePassword'])) {
    $password = $_POST['password'];
    $checkPassword = $_POST['checkPassword'];

    if ($password == $checkPassword) {
        $updatePassword = $bdd->prepare("UPDATE clients SET mdp=? WHERE id=?");
        $updatePassword->execute([$password, $idClient]);
        $isUpdate = 'Votre mot de passe a bien été modifié !';
    }
}

if (isset($_POST['deleteClient'])) {
    $delete = $bdd->prepare("DELETE FROM clients WHERE id=?");
    $delete->execute([$idClient]);
    header("Location: inscription.php");
}
?>
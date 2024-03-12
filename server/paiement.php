<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=restôt;charset=utf8', 'root', '');

if(isset($_POST['paiement'])){
    // Récupération des valeurs du formulaire
    $cardNumber = $_POST['card_number'];
    $cardDate = $_POST['card_date'];
    $cardCode = $_POST['card_code'];

    // Requête SQL pour récupérer l'ID du client
    $client = $bdd->prepare("SELECT id FROM clients WHERE mail=? AND mdp=?");
    $client->execute([$_SESSION['mail'], $_SESSION['mdp']]);
    $idClient = $client->fetchColumn();


    // Requête SQL pour insérer les données dans la table clients
    $insertion = $bdd->prepare("UPDATE clients SET card_number = ?, card_date = ?, card_code = ? WHERE id = ?");
    $insertion->execute(array($cardNumber, $cardDate, $cardCode, $idClient));

    // Vérification de la réussite de l'insertion
    if($insertion){
        echo "<script>window.open('../templates/confirmation_paiement.php', 'Confirmation de Paiement', 'width=400,height=300');window.close();</script>";
    } else {
        echo "Erreur lors de l'insertion des données.";
    }
}
?>

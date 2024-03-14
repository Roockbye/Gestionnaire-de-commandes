<?php
//session_start();
$bdd = new PDO('mysql:host=localhost;dbname=restôt;charset=utf8', 'root', '');

// Requête SQL pour récupérer l'ID du client
$client = $bdd->prepare("SELECT id FROM clients WHERE mail=? AND mdp=?");
$client->execute([$_SESSION['mail'], $_SESSION['mdp']]);

$idClient = '';

while ($row = $client->fetch(PDO::FETCH_ASSOC)) {
$idClient = $row['id'];
}

// Requête SQL pour récupérer la réservation du client
$reservation = $bdd->prepare("SELECT id FROM réservations WHERE id_client=?");
$reservation->execute([$idClient]);

while ($row = $reservation->fetch(PDO::FETCH_ASSOC)) {
if(isset($_POST['envoyer'.$row['id']])){
    // Récupération des valeurs du formulaire
    $description = $_POST['message'];
    
    $reservation = $bdd->prepare("SELECT id_restaurant FROM réservations WHERE id_client=?");
    $reservation->execute([$idClient]);
    $idResto = $reservation->fetchColumn();

    // Requête SQL pour insérer les données dans la table commentaires
    $insertion = $bdd->prepare("INSERT INTO commentaires (id_client, id_réservation, description, id_restaurant) VALUES (?, ?, ?, ?)");
    $insertion->execute([$idClient, $row['id'], $description, $idResto]);

    // Vérification de la réussite de l'insertion
    if($insertion){
        echo "<script>window.open('../templates/confirmation_commentaire.php', 'Confirmation de Commentaire', 'width=400,height=300');window.close();</script>";
    } else {
        echo "Erreur lors de l'insertion des données.";
    }
}
}
?>
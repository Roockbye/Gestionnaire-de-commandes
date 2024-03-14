<?php
//session_start();
$bdd = new PDO('mysql:host=localhost;dbname=restôt;charset=utf8', 'root', '');

// Requête SQL pour récupérer l'ID du client
$client = $bdd->prepare("SELECT id FROM clients WHERE mail=? AND mdp=?");
$client->execute([$_SESSION['mail'], $_SESSION['mdp']]);
$idClient = $client->fetchColumn();

// Requête SQL pour récupérer l'ID des reservations du client
$reservations = $bdd->prepare("SELECT id FROM réservations WHERE id_client=?");
$reservations->execute([$idClient]);

while ($row = $reservations->fetch(PDO::FETCH_ASSOC)) {
    if (isset($_POST['envoyer' . $row['id']])) {
        // Récupération des valeurs du formulaire
        $description = $_POST['newCommentaire'];
        $idReservation = $_POST['idReservation'];

        // Requête SQL pour récupérer l'ID des commentaires du client
        $commentaires = $bdd->prepare("SELECT id FROM commentaires WHERE id_client=? AND id_réservation=?");
        $commentaires->execute([$idClient, $idReservation]);

        while ($commentaire = $commentaires->fetch(PDO::FETCH_ASSOC)) {
            $comment = $_POST['commentaire' . $commentaire['id']];
            echo $comment;
            $update = $bdd->prepare("UPDATE commentaires SET description=? WHERE id=?");
            $update->execute([$comment, $commentaire['id']]);
        }

        $reservation = $bdd->prepare("SELECT id_restaurant FROM réservations WHERE id_client=?");
        $reservation->execute([$idClient]);
        $idResto = $reservation->fetchColumn();

        if (!empty($description)) {
            // Requête SQL pour insérer les données dans la table commentaires
            $insertion = $bdd->prepare("INSERT INTO commentaires (id_client, id_réservation, description, id_restaurant) VALUES (?, ?, ?, ?)");
            $insertion->execute([$idClient, $idReservation, $description, $idResto]);
        }
    }
}
?>
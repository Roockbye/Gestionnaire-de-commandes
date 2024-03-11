<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=restôt;charset=utf8;','root',"");

//INSCRIPTION
if(isset($_POST['inscription'])){
    $mail = $_POST['mail_inscription'];
    $mdp = $_POST['mdp_inscription'];
    $mdp_confirm = $_POST['mdp_confirm'];
    
    // Vérification que les champs ne sont pas vides
    if(empty($mail) || empty($mdp) || empty($mdp_confirm)){
        echo "Veuillez remplir tous les champs.";
    } else {
        if($mdp !== $mdp_confirm) {
            echo "Les mots de passe ne correspondent pas.";
        } else {
            $insert = $bdd->prepare('INSERT INTO clients(mail, mdp) VALUE(?, ?)');
            $insert->execute(array($mail, $mdp));

        // Redirection après l'inscription
        header("Location: compte.php");
        //exit();
        }
    }
}

//CONNEXION

//check if the user has clicked on submit button
if(isset($_POST['connexion'])){
    // now check
    if(!empty($_POST['mail_connexion']) && !empty($_POST['mdp_connexion'])){
        $mail = $_POST['mail_connexion'];
        $mdp = $_POST['mdp_connexion'];

        $recupClients = $bdd->prepare('SELECT mail, mdp FROM clients WHERE mail = ? AND mdp = ?');
        $recupClients->execute(array($mail, $mdp));

        if ($recupClients->rowCount() > 0){
            $_SESSION['mail'] = $mail;
            $_SESSION['mdp'] = $mdp;

            //URL Redirection
            header("Location: home.php");
            //exit();
        }else{
            echo "Votre mot de passe ou pseudo est incorrecte";
        }
    } else {
        //URL Redirection
        echo "<p style='color:Red;'> Veuillez compléter tous les champs";
    }
}
?>
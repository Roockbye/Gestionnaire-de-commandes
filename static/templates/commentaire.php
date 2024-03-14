<?php
    include "../../server/compte.php";
    include '../../server/commentaire.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire</title>
    <link rel="stylesheet" href="../css/commentaire.css">
</head>
<body>
<div class="popup">
    <h2>Donnez-nous votre avis !</h2>
    <form method="post">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo !empty($firstName) ? $firstName : '';?>">
        </div>
        <div class="form-group">
            <label for="mail">Mail :</label>
            <input type="email" id="mail" name="mail" value="<?php echo !empty($email)? $email : '';?>">
        </div>
        <div class="form-group">
            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit" class="btn" name="envoyer">Envoyer</button>
    </form>
</div>

</body>
</html>
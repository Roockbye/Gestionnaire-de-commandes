<?php
    include '../../server/paiement.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
    <link rel="stylesheet" href="../css/bancaire.css">
</head>
<body>

<div class="container">
    <h2>Paiement</h2>
    <form method="post">
        <div class="form-group">
            <label for="card-number">Numéro de carte:</label>
            <input type="text" id="card-number" name="card_number" autocomplete="off" placeholder="xxxx xxxx xxxx xxxx" required>
            <label for="expire-fin">Date d'expiration:</label>
            <input type="text" id="card-date" name="card_date" autocomplete="off" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" placeholder="MM/YY" required>
            <label for="code_securite">Code de sécurité:</label>
            <input type="text" id="card-code" name="card_code" autocomplete="off" placeholder="224" required>
        </div>
        <button type="submit" class="submit-btn" name="paiement">Payer</button>
    </form>
</div>

</body>
</html>
<form action="exo2.php" method="post">
    <label for="telephone">Enter Phone Number:</label>
    <input type="text" name="telephone" id="telephone">
    <br>
    <input type="submit" value="Submit">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $telephone = $_POST['telephone'];
    
    // Fonction pour valider et formater le numéro de téléphone
    function validerEtFormaterTelephone($telephone) {
        // Supprimer tous les caractères non numériques de la chaîne de téléphone
        $telephone = preg_replace('/\D/', '', $telephone);

        // Vérifier si la chaîne contient exactement 10 chiffres
        if (preg_match('/^\d{10}$/', $telephone)) {
            // Formater la chaîne en 00.00.00.00.00 (5 paires de chiffres séparés par des points)
            return preg_replace('/^(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})$/', '$1.$2.$3.$4.$5', $telephone);
        } else {
            return false; // Retourner false si le numéro de téléphone ne contient pas 10 chiffres
        }
    }

    // Valider et formater le numéro de téléphone saisi
    if ($telephone_formate = validerEtFormaterTelephone($telephone)) {
        echo "Numéro de téléphone formaté : " . $telephone_formate;
    } else {
        echo "Le numéro de téléphone n'est pas valide.";
    }
}
?>
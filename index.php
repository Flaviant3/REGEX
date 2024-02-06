<form action="index.php" method="post">
    <label for="url">Enter URL:</label>
    <input type="text" name="url" id="url">
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];
    if ($resultat = preg_replace('/(https?:\/\/)([^\\s]+)/', '<a href="$0" target="_blank">$0</a>', $url)) {
        echo $resultat;
    } else {
        echo 'L\'URL saisie n\'est pas valide';
    }
}
?>
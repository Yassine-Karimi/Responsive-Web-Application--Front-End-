<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises depuis le formulaire
    $name = $_POST["Name"];
    $ville = $_POST["Ville"];
    $email = $_POST["Email"];
    $phone = $_POST["Tel"];
    $typeLocal = $_POST["TypeLocal"];
    $sujet = $_POST["Sujet"];
    $autre = $_POST["Autre"];
    $message = $_POST["Massage"];

    // Faire quelque chose avec les données récupérées, comme les enregistrer dans une base de données ou les utiliser pour envoyer un email

    // Exemple d'affichage des données récupérées
    echo "Nom : " . $name . "<br>";
    echo "Ville : " . $ville . "<br>";
    echo "Email : " . $email . "<br>";
    echo "Téléphone : " . $phone . "<br>";
    echo "Type de local : " . $typeLocal . "<br>";
    echo "Sujet : " . $sujet . "<br>";
    echo "Autre : " . $autre . "<br>";
    echo "Message : " . $message . "<br>";
}
?>
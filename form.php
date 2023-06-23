<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['g-recaptcha-response']))
    {
        $recaptcha=$_POST['g-recaptcha-response'];
        
        if(!$recaptcha)
        {
            echo '<script>alert("Please go back and check recaptcha box")</script>';
            header("Refresh: 1; URL=contact.php");

            exit;  
        }
        else
        {
            $secret="6Lc4fMImAAAAAEOGGVwWzqjiWPYcEdfURwtOME8n"; 
            $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptcha;
            $response=file_get_contents($url);
            $responseKeys=json_decode($response,true);
            if( $responseKeys['success'])
            {
                // Récupérer les valeurs soumises depuis le formulaire
    $name = $_POST["Name"];
    $ville = $_POST["ville"];
    $email = $_POST["Email"];
    $phone = $_POST["Tel"];
    $typeLocal = $_POST["type"];
    $sujet = $_POST["Sujet"];
    $autre = $_POST["Autre"];
    $message1 = $_POST["Massage"];

    // Faire quelque chose avec les données récupérées, comme les enregistrer dans une base de données ou les utiliser pour envoyer un email

    // Exemple d'affichage des données récupérées
    echo "Nom : " . $name . "<br>";
    echo "Ville : " . $ville . "<br>";
    echo "Email : " . $email . "<br>";
    echo "Téléphone : " . $phone . "<br>";
    echo "Type de local : " . $typeLocal . "<br>";
    echo "Sujet : " . $sujet . "<br>";
    echo "Autre : " . $autre . "<br>";
    echo "Message : " . $message1 . "<br>";



// Database configuration
$servername = "localhost";  // Replace with your database servername
$username = "root";        // Replace with your database username
$password = "";           // Replace with your database password
$dbname = "test";        // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

// Retrieve the submitted values from the form


// Prepare and execute the SQL statement to insert data into the "client" table
$sql = "INSERT INTO client_com VALUES('$name', '$email', '$phone', '$ville', '$typeLocal', '$sujet', '$autre', '$message1')";
$to = "yassinkarimi.1.23@gmail.com";
$subject = "Contact";
$message = "Bonjour !\n";
$message .= "Nom : " . $name . "\n";
$message .= "Ville : " . $ville . "\n";
$message .= "Email : " . $email . "\n";
$message .= "Téléphone : " . $phone . "\n";
$message .= "Type de local : " . $typeLocal . "\n";
$message .= "Sujet : " . $sujet . "\n";
$message .= "Autre : " . $autre . "\n";
$message .= "Message : " . $message1 . "\n";

// En-têtes de l'email
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

// Envoyer l'email
$retour = mail($to,$subject,$message,$headers);
if ($conn->query($sql) === TRUE)
 {
       
  if($retour)
  {
    echo "Data inserted successfully";
    $testVariable = 'Bien Envoyer !';
    $conn->close();

    header("Location: contact.php?variable=" . urlencode($testVariable));

  }

    // Rediriger vers contact.php avec la variable dans l'URL
   // header("Location: contact.php?variable=" . urlencode($testVariable));
    exit();

} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $testVariable = 'Erreur !';
    $conn->close();

    header("Location: contact.php?variable=" . urlencode($testVariable));

 
            }
        }

    }
   
}
}

// Close the database connection

?>
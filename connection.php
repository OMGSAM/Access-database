<?php
$servername = "localhost";   
$username = "nom_utilisateur";   
$password = "OK10";   
$dbname = "PERSONNE";   

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT id, nom, email FROM PERSONNE");
    $stmt->execute();

     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
            </tr>";

    foreach($stmt->fetchAll() as $row) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nom"] . "</td>
                <td>" . $row["email"] . "</td>
              </tr>";
    }
    echo "</table>";
}
catch(PDOException $e) {
    echo "Connexion échouée: " . $e->getMessage();
}

$conn = null;
?>

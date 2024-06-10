<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyniki wyszukiwania</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Wyniki wyszukiwania</h1>
    
    <?php
    // Połączenie z bazą danych
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ogloszenia24";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Sprawdzenie połączenia
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Pobranie tytułu z formularza
    if(isset($_GET['query'])) {
        $query = $_GET['query'];

        // Zapytanie do bazy danych
        $sql = "SELECT * FROM oferty WHERE tytul LIKE '%$query%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Wyświetlenie ofert
            while($row = $result->fetch_assoc()) {
                echo "<div class='oferta'>";
                echo "<h2>" . $row["tytul"] . "</h2>";
                echo "<p><strong>Cena: </strong>" . $row["cena"] . " PLN</p>";
                echo "<img src='" . $row["zdjecie_url"] . "' alt='" . $row["tytul"] . "' style='max-width: 200px;'>";
                echo "<p>" . $row["opis"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Brak wyników wyszukiwania.</p>";
        }
    }

    // Zamknięcie połączenia
    $conn->close();
    ?>
</body>
</html>

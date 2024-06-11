<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ogloszenia24</title>
    <link rel="stylesheet" href="style_strony_glownej.css">
</head>
<body>
    <nav>
        <a href="strona_glowna.php" class="napis">Ogloszenia24</a>
        <div class="hrefy">
            <?php
                session_start();

                if(isset($_SESSION['username'])) {
                    echo '<a href="dodawanie_ogloszen.php">Dodaj ogloszenie</a>';
                    echo '<a href="strona_z_moimi_ogloszeniami.php">Moje ogloszenia</a>';
                    echo '<a href="wyloguj.php">Wyloguj</a>';
                } else {
                    echo '<a href="logowanie.php">Logowanie</a>';
                    echo '<a href="rejestracja.php">Rejestracja</a>';
                }
            ?>
        </div>
    </nav>
    <div class="oferty">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ogloszenia24";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $email = $_SESSION['username'];
            $sql = "SELECT id FROM uzytkownicy WHERE email = '$email'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $id = $row['id'];

            $sql = "SELECT * FROM oferty WHERE id_uzytkownika = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='oferta'>";
                    echo "<h2>" . $row["tytul"] . "</h2>";
                    echo "<p><strong>Cena: </strong>" . $row["cena"] . " PLN</p>";
                    echo "<img src='" . $row["zdjecie_url"] . "' alt='" . $row["tytul"] . "' style='max-width: 200px;'>";
                    echo "<p>" . $row["opis"] . "</p>";
                    echo "<a href='edytowanie_ogloszenia.php?id=" . $row['id'] . "'>Edytuj</a> | ";
                    echo "<a href='usuniecie_ogloszenia.php?id=" . $row['id'] . "' onclick='return confirm(\"Czy na pewno chcesz usunąć to ogłoszenie?\");'>Usuń</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nie dodales zadnej oferty.</p>";
            }

            $conn->close();
        ?>
    </div>
    
    <footer>
        <p>Ogloszenia24</p>
    </footer>
</body>
</html>

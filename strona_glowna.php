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
    <div class="search_bar">
        <form action="strona_glowna.php" method="get">
            <div class="pasek">            
                <input type="text" name="query" placeholder="Szukaj..." required>
                <input type="submit" value="Szukaj">
            </div>
        </form>
    </div>
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

            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['query'])) {
                $query = $_GET['query'];

                // Zapytanie do bazy danych
                $sql = "SELECT * FROM oferty WHERE tytul LIKE '%$query%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='oferta'>";
                        echo "<h2>" . $row["tytul"] . "</h2>";
                        echo "<p><strong>Cena: </strong>" . $row["cena"] . " PLN</p>";
                        echo "<img src='" . $row["zdjecie_url"] . "' alt='" . $row["tytul"] . "' style='max-width: 200px;'>";
                        echo "<p>" . $row["opis"] . "</p>";
                        echo "<p><strong>Oferta wrzucona: </strong>" . $row["data_utworzenia"] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Brak wyników wyszukiwania.</p>";
                }
    
            } else {
                $sql = "SELECT * FROM oferty";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<div class='oferta'>";
                    echo "<h2>" . $row["tytul"] . "</h2>";
                    echo "<p><strong>Cena: </strong>" . $row["cena"] . " PLN</p>";
                    echo "<img src='" . $row["zdjecie_url"] . "' alt='" . $row["tytul"] . "' style='max-width: 200px;'>";
                    echo "<p>" . $row["opis"] . "</p>";
                    echo "<p><strong>Oferta wrzucona: </strong>" . $row["data_utworzenia"] . "</p>";
                    echo "</div>";
                }
            }

            $conn->close();
        ?>
    </div>
    
    <footer>
        <p>Ogloszenia24</p>
    </footer>
</body>
</html>

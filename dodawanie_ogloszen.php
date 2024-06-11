<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: logowanie.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ogloszenia24";

$conn = new mysqli($servername, $username, $password, $dbname);
$email = $_SESSION['username'];
$sql = "SELECT id FROM uzytkownicy WHERE email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = $row['id'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $tytul = $_POST['tytul'];
    $opis = $_POST['opis'];
    $zdjecie_url = $_POST['zdjecie'];
    $cena = $_POST['cena'];
    
    // Zabezpieczenie przed SQL Injection
    $tytul = mysqli_real_escape_string($conn, $tytul);
    $opis = mysqli_real_escape_string($conn, $opis);
    
    $sql = "INSERT INTO oferty (tytul, opis, zdjecie_url, cena, id_uzytkownika) VALUES ('$tytul', '$opis', '$zdjecie_url', '$cena', '$id')";
    if ($conn->query($sql) === TRUE) {
        echo "Ogłoszenie dodane pomyślnie";
    } else {
        echo "Błąd podczas dodawania ogłoszenia: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie ogłoszenia</title>
    <link rel="stylesheet" href="dodawanie_ogloszen2.css">
</head>
<body>
<nav>
        <a href="strona_glowna.php" class="napis">Ogloszenia24</a>
        <div class="hrefy">
            <?php


                if(isset($_SESSION['username'])) {
                    echo '<a href="wyloguj.php">Wyloguj</a>';
                    echo '<a href="dodawanie_ogloszen.php">Dodaj ogloszenie</a>';
                }else{
                    echo '<a href="logowanie.php">Logowanie</a>';
                    echo '<a href="rejestracja.php">Rejestracja</a>';
                }
            ?>
        </div>
    </nav>
    
    <div class="formularz">

        <form action="dodawanie_ogloszen.php" id="ogloszenie_formularz" method="post">
            <h1>Dodawanie ogłoszenia</h1>
            <div class="inputy">
            <input type="text" placeholder="Tytuł" id="tytul" name="tytul" required>
            <textarea placeholder="Opis" id="opis" name="opis" required></textarea>
            <input type="text" name="zdjecie" id="zdjecie" placeholder="url do zdjecia">
            <input type="number" name="cena" id="cena" placeholder='cena'>
            <input type="submit" value="Dodaj ogłoszenie"></div>
        </form>
    </div>
    <footer>
        <p>Ogłoszenia24</p>
    </footer>
</body>
</html>

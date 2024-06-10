<?php
session_start();

// Sprawdzenie czy użytkownik jest zalogowany, jeśli nie, przekieruj go na stronę logowania
if(!isset($_SESSION['username'])) {
    header("Location: logowanie.php");
    exit;
}

// Połączenie z bazą danych - należy dodać dane dostępowe do bazy danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ogloszenia24";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie czy formularz został wysłany
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tutaj pobierz dane z formularza i dodaj ogłoszenie do bazy danych
    $tytul = $_POST['tytul'];
    $opis = $_POST['opis'];
    
    // Zabezpieczenie przed SQL Injection
    $tytul = mysqli_real_escape_string($conn, $tytul);
    $opis = mysqli_real_escape_string($conn, $opis);
    
    // Przykładowe zapytanie SQL dodające ogłoszenie
    $sql = "INSERT INTO ogloszenia (tytul, opis) VALUES ('$tytul', '$opis')";
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
    <link rel="stylesheet" href="logowanie_rejestracja.css">
</head>
<body>
    <h1>Dodawanie ogłoszenia</h1>
    <div class="formularz">
        <form action="dodawanie_ogloszen.php" id="ogloszenie_formularz" method="post">
            <!-- Tutaj umieść pola formularza do dodawania ogłoszenia -->
            <input type="text" placeholder="Tytuł" id="tytul" name="tytul" required>
            <textarea placeholder="Opis" id="opis" name="opis" required></textarea>
            <!-- Dodaj inne pola formularza, jeśli są potrzebne -->

            <input type="submit" value="Dodaj ogłoszenie">
        </form>
    </div>
    <footer>
        <p>Ogłoszenia24</p>
    </footer>
</body>
</html>

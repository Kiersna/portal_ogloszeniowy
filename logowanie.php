<?php
session_start();

// Połączenie z bazą danych - należy dodać dane dostępowe do bazy danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ogloszenia24";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie czy użytkownik jest już zalogowany, jeśli tak, przekieruj go na stronę dodawania ogłoszeń
if(isset($_SESSION['username'])) {
    header("Location: dodawanie_ogloszen.php");
    exit;
}

// Sprawdzenie czy formularz został wysłany
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Zabezpieczenie przed SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    
    // Zapytanie SQL w celu pobrania hasła użytkownika
    $sql = "SELECT * FROM uzytkownicy WHERE email='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Sprawdzenie czy hasło jest poprawne
        if (password_verify($password, $row['haslo'])) {
            // Zalogowano pomyślnie - ustaw zmienną sesyjną
            $_SESSION['username'] = $username;
            header("Location: dodawanie_ogloszen.php");
            exit;
        } else {
            // Błędne dane logowania
            echo "Błędne dane logowania";
        }
    } else {
        // Błędne dane logowania
        echo "Błędne dane logowania";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    <h2>Logowanie</h2>
    <form method="post">
        <div>
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <input type="submit" value="Zaloguj">
        </div>
    </form>
</body>
</html>

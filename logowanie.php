<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ogloszenia24";

$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_SESSION['username'])) {
    header("Location: strona_glowna.php");
    exit;
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Zabezpieczenie przed SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    
    
    $sql = "SELECT * FROM uzytkownicy WHERE email='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['haslo'])) {
            $_SESSION['username'] = $username;
            header("Location: strona_glowna.php");
            exit;
        } else {
            echo "Błędne dane logowania";
        }
    } else {
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
    <h2>Logowanie</h2>
    <form method="post">
        <div>
            <label for="username">e-mail:</label>
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

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ogloszenia24";

$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_SESSION['username'])) {
    header("Location: dodawanie_ogloszen.php");
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
            header("Location: dodawanie_ogloszen.php");
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

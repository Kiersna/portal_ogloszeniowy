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

$offer_id = $_GET['id'];

$sql = "DELETE FROM oferty WHERE id='$offer_id' AND id_uzytkownika='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Ogłoszenie usunięte pomyślnie";
} else {
    echo "Błąd podczas usuwania ogłoszenia: " . $conn->error;
}

header("Location: strona_z_moimi_ogloszeniami.php");
exit;
?>

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

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $tytul = $_POST['tytul'];
    $opis = $_POST['opis'];
    $zdjecie_url = $_POST['zdjecie'];
    $cena = $_POST['cena'];
    
    $tytul = mysqli_real_escape_string($conn, $tytul);
    $opis = mysqli_real_escape_string($conn, $opis);

    $sql = "UPDATE oferty SET tytul='$tytul', opis='$opis', zdjecie_url='$zdjecie_url', cena='$cena' WHERE id='$offer_id' AND id_uzytkownika='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Ogłoszenie zaktualizowane pomyślnie";
        header("Location: strona_z_moimi_ogloszeniami.php");
    } else {
        echo "Błąd podczas aktualizacji ogłoszenia: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM oferty WHERE id='$offer_id' AND id_uzytkownika='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $offer = $result->fetch_assoc();
    } else {
        echo "Nie znaleziono ogłoszenia.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytowanie ogłoszenia</title>
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
    <form action="edytowanie_ogloszenia.php?id=<?php echo $offer_id; ?>" id="ogloszenie_formularz" method="post">
        <h1>Edytowanie ogłoszenia</h1>
        <div class="inputy">
        <input type="text" placeholder="Tytuł" id="tytul" name="tytul" value="<?php echo $offer['tytul']; ?>" required>
        <textarea placeholder="Opis" id="opis" name="opis" required><?php echo $offer['opis']; ?></textarea>
        <input type="text" name="zdjecie" id="zdjecie" placeholder="url do zdjecia" value="<?php echo $offer['zdjecie_url']; ?>">
        <input type="number" name="cena" id="cena" placeholder='cena' value="<?php echo $offer['cena']; ?>">
        <input type="submit" value="Zaktualizuj ogłoszenie"></div>
    </form>
</div>
<footer>
    <p>Ogloszenia24</p>
</footer>
</body>
</html>

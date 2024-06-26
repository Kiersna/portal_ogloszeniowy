<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="logowanie_rejestracja.css">
</head>
<body>
    <nav>
        <a href="strona_glowna.php" class="napis">Ogloszenia24</a>
        <div class="hrefy">
            <?php
                session_start();

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
        <form action="" id="rejestracja_formularz" method="post">
        <h1>Rejestracja</h1>
            <input type="text" placeholder="Imię" id="imie" name="imie" required>
            <input type="text" placeholder="Nazwisko" id="nazwisko" name="nazwisko" required>
            <input type="email" placeholder="Email" id="email" name="email" required>
            <input type="password" placeholder="Twoje hasło" id="haslo" name="haslo" required>
            <p>Haslo musi zawierac 8 znakow w tym mala litere, duza litere, cyfre i znak specjalny</p>
            <input type="password" placeholder="Powtórz hasło" id="powtorz_haslo" name="powtorz_haslo" required><br>
            <label class="checkbox">
                <input type="checkbox" required> Akceptuję regulamin
            </label>
            <input type="submit" value="Zarejestruj się">
        </form>
    </div>
    <footer>
        <p>Ogłoszenia24</p>
    </footer>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $email = $_POST['email'];
            $haslo = $_POST['haslo'];
            $powtorz_haslo = $_POST['powtorz_haslo'];

            if ($haslo !== $powtorz_haslo) {
                echo "Hasła nie są identyczne!";
                exit();
            }
            if (strlen($haslo) < 8) {
                echo 'Hasło jest za krótkie, musi zawierać przynajmniej 8 znaków';
                exit();
            }
            if (!preg_match('/[A-Z]/', $haslo)) {
                echo 'Hasło musi zawierać przynajmniej jedną wielką literę';
                exit();
            }
            if (!preg_match('/[a-z]/', $haslo)) {
                echo 'Hasło musi zawierać przynajmniej jedną małą literę';
                exit();
            }
            if (!preg_match('/\d/', $haslo)) {
                echo 'Hasło musi zawierać przynajmniej jedną cyfrę';
                exit();
            }
            if (!preg_match('/[\W_]/', $haslo)) {
                echo 'Hasło musi zawierać przynajmniej jeden znak specjalny';
                exit();
            }
            $conn = mysqli_connect('localhost', 'root', '', 'ogloszenia24');
            $sql = "SELECT email FROM uzytkownicy WHERE email = '$email';";
            $ilosc_maili = mysqli_num_rows(mysqli_query($conn, $sql));
            if($ilosc_maili > 0){
                echo 'ten mail jest juz zarejestrowany';
                exit();
            }
            $hashed_haslo = password_hash($haslo, PASSWORD_DEFAULT);
            $sql = "INSERT INTO uzytkownicy (Imie, Nazwisko, email, haslo) VALUES ('$imie', '$nazwisko', '$email', '$hashed_haslo')";

            if (mysqli_query($conn, $sql)) {
                echo "Rejestracja zakończona sukcesem!";
            } else {
                echo "Błąd: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    ?>
</body>
</html>

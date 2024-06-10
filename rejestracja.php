<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="logowanie_rejestracja.css">
</head>
<body>
    <h1>Rejestracja</h1>
    <div class="formularz">
        <form action="" id="rejestracja_formularz" method="post">
            <input type="text" placeholder="Imię" id="imie" name="imie" required>
            <input type="text" placeholder="Nazwisko" id="nazwisko" name="nazwisko" required>
            <input type="email" placeholder="Email" id="email" name="email" required>
            <input type="password" placeholder="Twoje hasło" id="haslo" name="haslo" required>
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
            $conn = mysqli_connect('localhost', 'root', '', 'ogloszenia24');
            $sql = "SELECT email FROM uzytkownicy WHERE email = '$email';";
            $ilosc_maili = mysqli_num_rows(mysqli_query($conn, $sql));
            if($ilosc_maili > 0){
                echo 'ten mail jest juz zarejestrowany';
                exit();
            }
            $hashed_haslo = password_hash($haslo, PASSWORD_DEFAULT);
            $sql = "INSERT INTO uzytkownicy (imie, nazwisko, email, haslo) VALUES ('$imie', '$nazwisko', '$email', '$hashed_haslo')";

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="logowanie_rejestracja.css">
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LcgRPMpAAAAABVYEld96OO9m0KiEbfm9TgLFumD"></script>
</head>
<body>
    <h1>Rejestracja</h1>
    <div class="formularz">
    <form action="" id='rejestracja_formularz'>
        <input type="text" placeholder="Imie" id="imie">
        <input type="text" placeholder="Nazwisko" id="nazwisko">
        <input type="text" placeholder="email" id="email">
        <input type="password" placeholder="twoje haslo" id="haslo">
        <input type="password" placeholder="powtorz haslo" id="powtorz_haslo"><br>
        <label class='checkbox'>
            <input type="checkbox"> Akceptuje regulamin
        </label>
        <button class="g-recaptcha"
            data-sitekey="6LcgRPMpAAAAABVYEld96OO9m0KiEbfm9TgLFumD"
            data-callback='onSubmit'
            data-action='submit'>
            Zaloguj się
        </button>
    </form>
    </div>
    <footer>
        <p>Ogloszenia24</p>
    </footer>
</body>
<!-- Replace the variables below. -->
<script>
  function onSubmit(token) {
    document.getElementById("rejestracja_formularz").submit();
  }
</script>
</html>
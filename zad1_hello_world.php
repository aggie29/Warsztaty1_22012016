<?php

echo("<br>Zadanie 1: Napisz 'Hello World'<br> ");

$imie = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['imie']) && strlen(trim($_POST['imie'])) > 2) {
        $imie = trim($_POST['imie']);
    }

    if ($imie) {
        echo("Witaj $imie");
    } else {
        echo("Wyplenij formularz ponownie");
    }
}
?>

<form action="zad1_hello_world.php" method="POST">

    <fieldset>
        <legend>Imie uzytkownika</legend>
        <p>
            <label>
                Imie:
                <input type="text" name="imie" placeholder="Podaj swoje imie"">
            </label>
        </p>

        <input type="submit" name="wyslij">

    </fieldset>



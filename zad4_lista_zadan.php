<?php

echo("<br>Zadanie 4: Lista zadan<br> ");

if (isset($_COOKIE['lista'])) {
    $lista = unserialize($_COOKIE['lista']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['zadanie'])) {
        $lista[] = trim($_POST['zadanie']);
        setcookie('lista', serialize($lista), time() + 3600 * 24);
    }
}
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>Lista zadań</title>
</head>
<body>
<?php
if (isset($lista)) {
    echo '<ol>';
    foreach ($lista as $l) {
        echo '<li>' . $l . '</li>';
    }
    echo '</ol>';
} else {
    echo '<p>Brak zadań na liście</p>';
}
?>

<form action="zad4_lista_zadan.php" method="POST">

    <fieldset>
        <legend>Zadania</legend>
        <p>
            <label>
                <input type="text" name="zadanie" placeholder="dodaj zadanie">
            </label>
        </p>

        <input type="submit" name="dodaj" placeholder="dodaj">

    </fieldset>

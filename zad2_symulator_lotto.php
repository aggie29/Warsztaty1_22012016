<?php

echo("<br>Zadanie 2: Symulator Lotto<br> ");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //var_dump($_POST['losowanie']); //sprawdzenie tablicy
    if (isset($_POST['losowanie']) && count($_POST['losowanie']) == 6) {
        $wybrane = array_keys($_POST['losowanie']);

        //sortuję rosnąco wybrane liczby
        sort($wybrane);

        //tworzę tablicę z wszystkimi liczbami z wybranego zasięgu
        $wszystkieLiczby = range(1, 49);

        //mieszam tablicę z wszystkimi liczbami z wybranego zasięgu
        shuffle($wszystkieLiczby);

        //wycinam z tablicy z pomieszanymi wszystkimi liczbami 6 elementów
        $wylosowane = array_slice($wszystkieLiczby, 0, 6);

        //sortuję wylosowane liczby
        sort($wylosowane);

        echo 'Wybrane liczby to: ' . implode(', ', $wybrane);
        echo '<br>';
        echo 'Wylosowane liczby to: ' . implode(', ', $wylosowane);
        echo '<br>';
        $iloscTrafionych = 0;
        foreach ($wylosowane as $w) {
            if (array_key_exists($w, $_POST['losowanie'])) {
                $iloscTrafionych++;
            }
        }
        echo 'Trafiles ' . $iloscTrafionych . ' liczb';
    } else {
        echo 'Wybierz prawidlowa ilosc liczb';
    }
}

?>

<head>
    <meta charset="utf-8">
</head>
<form action="zad2_symulator_lotto.php" method="POST">

    <fieldset>
        <legend>Wybierz 6 liczb</legend>

        <p>

            <?php for ($i = 1; $i < 50; $i++): ?>
                <label>

                    <input type="checkbox" name="losowanie[<?php echo $i; ?>]"> <?php echo $i; ?>

                </label>
            <?php endfor; ?>

        </p>

        <input type="submit" value="losuj">
    </fieldset>
</form>


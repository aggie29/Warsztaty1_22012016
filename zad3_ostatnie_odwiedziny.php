<?php
setcookie('odwiedziny', time(), time() + 3600 * 24);

if (!isset($_COOKIE['odwiedziny'])) {
    echo "Witaj pierwszy raz na naszej stronie<br>";
} else {
    echo "Ostatnio na naszej stronie byles<br>" . date("H/i/s");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    setcookie('odwiedziny', date("H/i/s"), time() - 1);
    echo '<br>Usunieto date ostatnich odwiedzin';
}
?>

<!DOCTYPE html>
<html>
<body>
<br>

<?php if (isset($_COOKIE['odwiedziny'])): ?>
    <form method="post">
        <input type="submit" value="Usun date ostatnich odwiedzin">
    </form>
<?php endif; ?>

</body>
</html>





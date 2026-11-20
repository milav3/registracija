<?php
session_start();
$greska = $_SESSION['greska'] ?? '';
unset($_SESSION['greska']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = trim($_POST['ime_prezime'] ?? '');
    if ($ime === '') {
        unset($_SESSION['ime']);
        $greska = 'Molimo unesite ime i prezime!';
    } else {
        $_SESSION['ime'] = $ime;
        header('Location: korak2.php');
        exit;
    }
}
?>
<h3>Registracija - korak 1</h3>
<font color="red"><?= $greska ?></font>

<form method="post">
Ime i prezime:
<input type="text" name="ime_prezime" value="<?= htmlspecialchars($_SESSION['ime'] ?? '') ?>">
<br/>
<br/>
<input type="submit" name="submit" value="submit">
</form>

<a href="korak1.php">Korak 1</a>
| <a href="korak2.php">Korak 2</a>
| <a href="korak3.php">Korak 3</a>
| <a href="korak4.php">Kraj</a>
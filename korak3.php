<?php
session_start();
if (empty($_SESSION['ime'])) {
    $_SESSION['greska'] = 'Molimo unesite ime i prezime!';
    header('Location: korak1.php');
    exit;
}
if (empty($_SESSION['email'])) {
    $_SESSION['greska'] = 'Email adresa nije u odgovarajucem formatu!';
    header('Location: korak2.php');
    exit;
}
$greska = $_SESSION['greska'] ?? '';
unset($_SESSION['greska']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['potvrda'])) {
        unset($_SESSION['uslovi']);
        $greska = 'Molimo prihvatite uslove registracije!';
    } else {
        $_SESSION['uslovi'] = true;
        header('Location: korak4.php');
        exit;
    }
}
?>
<h3>Registracija - korak 3</h3>
<font color="red"><?= $greska ?></font>

<form method="post">
Ime i prezime: <strong><?= htmlspecialchars($_SESSION['ime']) ?></strong>
<br/>
Email: <strong><?= htmlspecialchars($_SESSION['email']) ?></strong>
<br/><br/>

Prihvatam uslove registracije: <input type="checkbox" name="potvrda" value="Y" <?= !empty($_SESSION['uslovi']) ? 'checked' : '' ?>>
<br/><br/>
<input type="submit" name="submit" value="submit">
</form>


<a href="korak1.php">Korak 1</a>
| <a href="korak2.php">Korak 2</a>
| <a href="korak3.php">Korak 3</a>
| <a href="korak4.php">Kraj</a>

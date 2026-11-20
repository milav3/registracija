<?php
session_start();
if (empty($_SESSION['ime'])) {
    $_SESSION['greska'] = 'Molimo unesite ime i prezime!';
    header('Location: korak1.php');
    exit;
}

$greska = $_SESSION['greska'] ?? '';
unset($_SESSION['greska']);

$email_vrednost = $_SESSION['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $email_vrednost = $email;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        unset($_SESSION['email']);
        $greska = 'Email adresa nije u odgovarajucem formatu!';
    } else {
        $_SESSION['email'] = $email;
        header('Location: korak3.php');
        exit;
    }
}
?>
<h3>Registracija - korak 2</h3>
<font color="red"><?= $greska ?></font>

<form method="post">
Ime i prezime: <strong><?= htmlspecialchars($_SESSION['ime']) ?></strong>
<br/>
Email: <input type="text" name="email" value="<?= htmlspecialchars($email_vrednost) ?>"><br/>
<br/>
<input type="submit" name="submit" value="submit">
</form>

<a href="korak1.php">Korak 1</a>
| <a href="korak2.php">Korak 2</a>
| <a href="korak3.php">Korak 3</a>
| <a href="korak4.php">Kraj</a>


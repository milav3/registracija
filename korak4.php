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
if (empty($_SESSION['uslovi'])) {
    $_SESSION['greska'] = 'Molimo prihvatite uslove registracije!';
    header('Location: korak3.php');
    exit;
}

session_destroy(); 
?>
<h3>Registracija - uspešna</h3>

Hvala!
<br/>
<br/>
<a href="korak1.php">Nova registracija</a>
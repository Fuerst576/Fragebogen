<?php
session_start();

require_once "config.inc.php";
require_once "./thema/classes/Quiz.class.php";
require_once "./classes/Auth.class.php";


$Auth = new Auth();
$Quiz = new Quiz();

if (isset($_POST['Login'])) {

    if($Auth->login($_POST['username'], $_POST['password']) && $Quiz->getAntworten($_POST['username'])) {
        $_SESSION['darfrein'] = true;
        $_SESSION['name'] = $_POST['username'];
        header("Location: ./thema/ergebnis.php");
    } elseif ($Auth->login($_POST['username'], $_POST['password'])) {
        $_SESSION['darfrein'] = true;
        $_SESSION['name'] = $_POST['username'];
        header("Location: ./thema/index.php");
    } else {
        header("Location: index.php?error=1");
    }
    exit;
}

if (isset($_POST['registriren'])) {

    if ($Auth->registriren($_POST['username'], $_POST['password'])) {
        header("Location: index.php");
    } else {
        header("Location: index.php?error=2");
    }
    exit;
}

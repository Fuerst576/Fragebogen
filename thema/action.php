<?php
session_start();
require_once("../config.inc.php"); // DB-Zugangsdaten
require_once("./classes/Quiz.class.php");


if (!isset($_SESSION['name'])) {
    header("Location: ../index.php");
    exit;
}

$quiz = new Quiz();
$username = $_SESSION['name'];

if ($quiz->getAntworten($username)) {
    header("Location: ergebnis.php");
    exit;
}

$username = $_SESSION['name'];

$loesungen = [
    'frage1' => 'Kryton',
    'frage2' => 'Nordpol',
    'frage37' => 'Nein',
    'frage4' => 'Hondo',
    'frage5' => 'Endor',
    'frage6' => 'Ja',
];


$success = $quiz->uploadAntwort($username, $_POST, $loesungen);


$punkte = 0;
foreach ($loesungen as $frage => $richtig) {
    if (isset($antworten[$frage]) && $antworten[$frage] === $richtig) {
        $punkte++;
    }
}


header("Location: ergebnis.php");
exit;

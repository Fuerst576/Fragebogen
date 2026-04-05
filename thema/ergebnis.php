<?php
session_start();
require_once("../config.inc.php");
require_once("./classes/Quiz.class.php");

if (!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['name'];

$quiz = new Quiz();
$antwortenListe = $quiz->getAntworten($username);


$neuestesErgebnis = $antwortenListe[0];

$punkte = $neuestesErgebnis['points'];

$punkte0 = $quiz->getAnzahlFuerPunkte(0);
$punkte1 = $quiz->getAnzahlFuerPunkte(1);
$punkte2 = $quiz->getAnzahlFuerPunkte(2);
$punkte3 = $quiz->getAnzahlFuerPunkte(3);
$punkte4 = $quiz->getAnzahlFuerPunkte(4);
$punkte5 = $quiz->getAnzahlFuerPunkte(5);
$punkte6 = $quiz->getAnzahlFuerPunkte(6);


?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Quiz Ergebnis</title>
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0"></script>
    <style>
        #box{
            width: 70%;
        }
        li{
            padding: 5px;
        }

        #spieler, #punkte{
            margin-top: 40px;
        }

        #spieler{
            font-size: 1.5em;
        }
        #punkte{
            font-size: 2em;
        }
    </style>
</head>
<body>

<div id="box">
    <h1>Ergebnis</h1>


    <form class="h1" action="logout.php" method="post">
        <input type="submit" value="Abmelden">
    </form>

    <p id="spieler"><strong>Spieler:</strong> <?php echo htmlspecialchars($username); ?></p>

    <h3 id="punkte">Punkte: <?php echo $punkte; ?> / 6</h3>

    <div class="vergleich">
<div>
    <h3>Deine Antworten</h3>
    <ul>
        <?php
        for ($i = 1; $i <= 6; $i++):
            $frage = "f$i";
            ?>
            <li><?php echo "Frage $i"; ?>: <?php echo htmlspecialchars($neuestesErgebnis[$frage] ?? 'keine Antwort'); ?></li>
        <?php endfor; ?>
    </ul>
</div>
    <div>
    <h3>Lösung</h3>
    <ul>
        <li>Frage 1: <strong>Kryton</strong> ist ein erfundenes Wort und damit kein Edelgas.</li>
        <li>Frage 2: Das erste Bild ist korrekt, da der <strong>Nordpol</strong> als Eiswüste zählt.</li>
        <li>Frage 3: <strong>Nein</strong>, Blackbeard hat Lunten in seinem Bart und Haare angezündet, aber niemals sich selbst.</li>
        <li>Frage 4: <strong>Das erste Bild</strong> zeigt Hondo aus der Serie Star Wars: The Clone Wars.</li>
        <li>Frage 5: <strong>Endor</strong> ist kein Planet, sondern ein Mond aus Star Wars.</li>
        <li>Frage 6: <strong>Ja</strong>, eine Banane gilt aus botanischer Sicht als Beere.</li>
    </ul>
    </div>
    </div>

    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

    <script>
        const xValues = ["0","1", "2", "3", "4", "5","6"];
        const yValues = [<?= $punkte0?>,<?= $punkte1?>, <?= $punkte2?>, <?= $punkte3?>, <?= $punkte4?>, <?= $punkte5?>,<?= $punkte6?>];
        const barColors = ["blue","cyan"];

        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: "Punkteverteilung",
                        font: { size: 16 }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: "Erreichte Punkte"
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: "Anzahl"
                        },
                        beginAtZero: true
                    }
                }
            }
        });

    </script>


</div>

</body>
</html>

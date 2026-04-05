<?php
session_start();

$username = $_SESSION['name'];

if (!isset($_SESSION['name'])) {
    header("Location: ../index.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="de">
<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Quiz</title>

    <style>

        #box{
            background-color: #ffffff;
            width: 50%;
            margin: auto;
            padding: 40px;
            border-radius: 50px;
        }

        .submit{
            margin: 20px 10px 10px 10px;
        }

        h2{
            margin-top: 35px;
            margin-bottom: 10px;
        }

        hr{
            margin: 50px 10px;
        }
    </style>
</head>
<body>

<div id="box">

<h1> <?php echo "Hallo " .htmlspecialchars($username); ?></h1>
    <form class="h1" action="logout.php" method="post">
        <input type="submit" value="Abmelden">
    </form>

    <form action="action.php" method="POST">

        <h2>Frage 1: Welcher der folgenden Stoffe ist kein Edelgas?</h2>
        <label>
            <input type="radio" name="frage1" value="Neon" required>
            Neon
        </label><br>
        <label>
            <input type="radio" name="frage1" value="Argon">
            Argon
        </label><br>
        <label>
            <input type="radio" name="frage1" value="Krypton">
            Krypton
        </label><br>
        <label>
            <input type="radio" name="frage1" value="Xenon">
            Xenon
        </label><br>
        <label>
            <input type="radio" name="frage1" value="Radon">
            Radon
        </label><br>
        <label>
            <input type="radio" name="frage1" value="Kryton">
            Kryton
        </label><br>
        <label>
            <input type="radio" name="frage1" value="Helium">
            Helium
        </label><br>
        <hr>

        <h2>Frage 2: Welches der gezeigten Bilder zeigt eine Wüste?</h2>

        <label class="img-option">
            <input type="radio" name="frage2" value="Nordpol" required>
            <img src="img/wueste-welt-weltweit-erde-trocken-landschaft-sand-stein-salz-eis-114~_v-img__16__9__xl_-d31c35f8186ebeb80b0cd843a7c267a0e0c81647.jpg" alt="Night City">
        </label>

        <label class="img-option">
            <input type="radio" name="frage2" value="Mesa">
            <img src="img/variant.jpg" alt="Los Santos">
        </label>

        <br>

        <label class="img-option">
            <input type="radio" name="frage2" value="Wald">
            <img src="img/der-wald.png" alt="Los Santos">
        </label>

        <label class="img-option">
            <input type="radio" name="frage2" value="Savanne">
            <img src="img/savanne.png" alt="Los Santos">
        </label>


        <br>
        <hr>


        <h2>Frage 3: Stimmt es, dass Kapitän Blackbeard sich tatsächlich den Bart anzündete?</h2>
        <select name="frage37" required>
            <option value="">Bitte wählen</option>
            <option value="Ja">Ja</option>
            <option value="Nein">Nein</option>

        </select>
        <br>
        <hr>


        <h2>Frage 4: Auf welchem der Bilder ist Hondo zu sehen?</h2>

        <label class="img-option">
            <input type="radio" name="frage4" value="Hondo" required>
            <img src="img/HondoHS-Revival.png" alt="Night City">
        </label>

        <label class="img-option">
            <input type="radio" name="frage4" value="Rando">
            <img src="img/portre.jpeg" alt="Los Santos">
        </label>


        <br>
        <hr>

        <h2>Frage 5: Welche der folgenden Welten ist kein Planet?</h2>
        <label>
            <input type="radio" name="frage5" value="Coruscant" required>
            Coruscant
        </label><br>
        <label>
            <input type="radio" name="frage5" value="Mandalore">
            Mandalore
        </label><br>
        <label>
            <input type="radio" name="frage5" value="Naboo">
            Naboo
        </label><br>
        <label>
            <input type="radio" name="frage5" value="Endor">
            Endor
        </label><br>
        <hr>

        <h2>Frage 6: Gilt die Banane aus botanischer Sicht als Beere?</h2>
        <select name="frage6" required>
            <option value="">Bitte wählen</option>
            <option value="Ja">Ja</option>
            <option value="Nein">Nein</option>
        </select>
        <br>



        <input class="submit" type="submit" value="Absenden">

    </form>



</div>



</body>
</html>

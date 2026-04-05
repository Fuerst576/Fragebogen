<!Doctype html>
<html lang="de">
<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Quiz</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background-image: url("/thema/img/1377556044-1.jpeg");
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }


        #loginbox{
            width: 500px;
            margin: 0 auto;
            margin-top: 100px;
            border: 5px solid #000000;
            background-color: #f9f9f9;
            padding: 40px;
            padding-top: 10px;
            border-radius: 50px;
        }

        input{
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
        }

        .textinput{
            width: 90%;

        }
    </style>
</head>
<body>

<div id="loginbox">
<h1>Das Quiz, das niemand brauchte</h1>
<p>Danke, dass du an unserem Quiz teilnimmst – auch wenn niemand danach gefragt hat.
    Dich erwarten Fragen, die irgendwo zwischen Wissen, Halbwissen und „Das hab ich mal gehört“ liegen. Ob du hier etwas lernst, ist fraglich – aber unterhalten wirst du hoffentlich trotzdem.</p>

    <p>Mit der Teilnahme an diesem Quiz erklärst du dich damit einverstanden, dass die von dir eingegebenen Daten gespeichert und im Rahmen dieses Projekts verarbeitet und veröffentlicht werden dürfen. Eine Weitergabe an Dritte erfolgt nicht. Die Daten dienen ausschließlich der Auswertung und Darstellung der Quiz-Ergebnisse.</p>

<h1>Login</h1>

<form action="action.php" method="post">
     <input class="textinput" type="text" name="username" placeholder="Name"><br>
     <input class="textinput" type="password" name="password" placeholder="Passwort"><br>
    <input type="submit" name="Login" value="Login">

</form>

<a href="seite.php">Registriren</a><br><br>




<?php
if(isset($_GET['error']) && $_GET['error'] == 1){
echo "Benutzername oder Passwort ist falsch. Bitte versuchen Sie es erneut.";
}elseif(isset($_GET['error']) && $_GET['error'] == 2){
    echo "Die eingegebenen Daten sind ungültig oder der Benutzername ist bereits vergeben.";
}
?>


</div>

</body>
</html>

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
            width: 300px;
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


    </style>
</head>
<body>

<div id="loginbox">


    <h1>Registriren</h1>

    <form action="action.php" method="post">
        <input type="text" name="username" placeholder="Name"><br>
        <input type="password" name="password" placeholder="Passwort"><br>
        <input type="submit" name="registriren" value="registriren">
    </form>

    <a href="index.php">Login</a><br>



</div>

</body>
</html>
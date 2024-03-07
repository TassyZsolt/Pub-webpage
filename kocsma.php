<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Kocsma</title>
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" href="img/logo.png" type="icon type">
</head>
<body>
<nav>
    <img class="logo" src="img/logo.png">
    <label class="title">Legjobb Hely</label>
    <ul>
        <li><a href="index.php">Kezdőlap</a></li>
        <li><a href="kocsma.php">Kocsmánk</a></li>
        <li><a href="soreink.php">Söreink </a></li>
        <li><a href="fozde.php">Sörfőzdénk </a></li>
        <li><a href="kapcsolat.php">Kapcsolat</a></li>
        <li><a href="tortenet.php">Történetünk</a></li>
        <?php if (isset($_SESSION["username"]) && !empty($_SESSION["username"])): ?>
            <li><a href="profile.php">Profil</a></li>
            <li><a href="uzenetek.php">Üzenetek</a></li>
            <li><a href="logout.php">Kijelentkezés</a></li>
        <?php else: ?>
            <li><a href="loginPage.php" class="active">Bejelentkezés</a></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="card1 w3-animate-left">


    <img src="img/kocsma.jpg">
    A kocsma hangulata nagy része a sörivás élményének. A pubok nyüzsgő és társasági környezetet kínálnak, ahol az emberek összejöhetnek egy hideg sörre és jó társaságra.
    Sok kocsma kínál szórakoztatást is, például élőzenét, triviaesteket vagy sportjátékokat a tévében.
    Ez barátságos és szórakoztató légkört teremt, amely fokozza a kocsmában való sörivás általános élményét.
</div>
<?php

?>
</body>
</html>
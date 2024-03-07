<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Rólunk</title>
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
<div class="card1">
    <p> <img src="img/tortenelem.png">
    <div class="elsobetu">
        A sörfőzés évezredek óta létezik, és sokak számára kedvelt időtöltéssé vált. A sörkészítés gazdag történetétől a modern sörfőzdék élményéig sok felfedeznivaló van a sör világában.
        A mi sörfőzdénk ötlete 1980-ban kezdett el kibontakozni, amikor is egyik családtagunk elkezdet magának otthon kistételben sört főzni.
        Ezt a párlatot majd tovább finomítgattuk, alakítottuk amíg végül elértük a ma már a környéket méltán híres alap lágerünket.
        A Sör kisipari főzésére még egészen 5 évet kellet várnunk, amikor is egy állami támogatást megnyervén lehetőségünk és így már képességünk is adott lett,
        hogy belekezdjünk a saját söreink főzésébe és új modernebb változatok kidolgozásába is.
    </div>
    </p>
</div>
<?php

?>
</body>
</html>

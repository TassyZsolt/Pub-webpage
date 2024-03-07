<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Sörfőzde</title>
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
<div class = "card1">
    <img src="img/sorfozde.webp">
    <p>Egy sörfőzde látogatása izgalmas élmény lehet, hiszen lehetőséget kínál a főzési folyamat megismerésére és a különféle sörök kipróbálására.
        A sörfőzdei túra során a látogatók első kézből láthatják, hogyan keverednek az összetevők és hogyan készül a sör.
        A különböző sörfajták kóstolása lehetővé teszi a különböző felhasznált összetevők, például a komló és a maláta jobb megértését, valamint azt, hogy ezek hogyan befolyásolják a sör ízét.
        <br>
    <div class="elsobetu">
        Az alábbiakban a sörfőzés rejtelmeit bemutató videót láthattok:
    </div>
    </p>
    <div class="middle">
        <iframe width="1164" height="873" src="https://www.youtube.com/embed/FEMuHkzCo-4" title="How It&#39;s Made - Beer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</div>
<?php

?>
</body>
</html>



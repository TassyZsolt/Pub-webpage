<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta name="author" content="Tassy Zsolt"/>
    <meta name="description" content=" Egy sörfőzdét bemutató landing page."/>
    <title>SzegediSörfőzde</title>
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
    <div class = middle>
        <img src="img/logo.png">
    </div>
    <p>A sörfőzés gazdag történetétől a modern kor sörfőzdéig és a kocsma nyüzsgő hangulatáig mindenki talál kedvére valót.
        Akár sörrajongó, akár egyszerűen csak egy vidám éjszakát keres, a sörfőzés és a pubok izgalmas és egyedi élményt kínálnak.
        Üdvözlünk a weboldalunkon! <br>Bátran nézz körbe és ha megtetszik amit látsz keress fel minket kocsmánkban,<br> vagy látogass el a sörfőzdénkbe. </p>
    <p> Termékeink minőségi alapanyagokból, nagy precízitásal és odafigyelésel készülnek melynek köszönhetően elnyertük rengeteg visszatérő vendégünk hűséget.</p>

    <a href="fozde.html"><img src="img/sorcsap.jpg" width="50%" /></a>
    <div class = middle>
        <a href="kocsma.html"><img src="img/kocsma.jpg"/></a>
    </div>
    <div class = middle>
        <img src="img/beer.jpg">
    </div>

</div>

<?php

?>
</body>
</html>
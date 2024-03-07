<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Kapcsolat</title>
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

<p>Amennyiben megjegyzése, észrevétele vagy csupán kérdése van, bátran vegye fel velünk a kapcsolatot!</p>
<div class="container">
    <form action="/action_page.php">
        <label for="fname">Előnév</label>
        <input type="text" id="fname" name="firstname" placeholder="Családneve..">

        <label for="lname">Utónév</label>
        <input type="text" id="lname" name="lastname" placeholder="Keresztneve..">

        <label for="country">Ország</label>
        <select id="country" name="country">
            <option value="australia">Magyarország</option>
        </select>

        <label for="subject">Téma</label>
        <textarea id="subject" name="subject" placeholder="írj valamit.." style="height:200px"></textarea>

        <input type="submit" value="Elküld">
        <input type="reset" value="Töröl">
    </form>
</div>
<?php

?>
</body>
</html>

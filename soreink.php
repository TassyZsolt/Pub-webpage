<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Termékeink</title>
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

<div  class ="contain center">
    <div class="card w3-animate-left">

        <table style="width:100%">
            <tr>
                <th><img src="img/leggjobsör.png" ></th>
                <th>           <div class="elsobetu"> <h4><b>Legjobb Sör</b></h4></div>
                    <p>A Legjobb Sör receptje a hagyományos sörfőzés értékeit követi. A kukoricát elhagyva a Legjobb Sör csak három klasszikus összetevőt tartalmaz:
                        árpamaláta, kristálytiszta víz és kétféle komló. Ez adja a sör kellemesen kesernyés, karakteres ízét, aranyló színét és fehér habkoronáját.</p></th>
            </tr>
        </table>
    </div>

    <div class="card w3-animate-left">
        <table style="width:100%">
            <tr>
                <th><img src="img/hidegkomllo.png" ></th>
                <th>           <div class="elsobetu"> <h4><b>Legjobb Hidegkomlós</b></h4></div>
                    <p>A Legjobb sörökre jellemző, kellemesen karakteres ízt a hidegkomlózás során hozzáadott Citra komlóval gazdagítottuk.
                        Illatában és ízében egyértelműen dominál az aroma komló, amely nyers komlóra és zöld növényekre emlékeztet..</p></th>
            </tr>
        </table>
    </div>


    <div class="card w3-animate-right">

        <table style="width:100%">
            <tr>
                <th><img src="img/afonyassor.png" ></th>
                <th>           <div class="elsobetu"> <h4><b>Legjobb Áfonya</b></h4></div>
                    <p>Karakteres lager sörünket az áfonya jellegzetesen fanyar ízvilága és a kétféle hozzáadott komló teszi annyira izgalmassá.
                        Azoknak ajánljuk, akik mindig új élményeket keresnek, és rajonganak a kellemesen gyümölcsös ízű sörkülönlegességekért.</p></th>
            </tr>
        </table>
    </div>

    <div class="card w3-animate-right">

        <table style="width:100%">
            <tr>
                <th><img src="img/alkoholmentes.png" ></th>
                <th>          <div class="elsobetu">  <h4><b>Legjobb 0%</b></h4></div>
                    <p>Nagyszerű íz, alkohol nélkül.
                        Sörfőzőmestereink a nulláról indulva évekig kutattak, kísérleteztek és kóstoltak, míg végül megalkották ezt az egyedülálló receptúrát:
                        gyümölcsös ízjegyek és a lágy árpamaláta aromájának tökéletes egyensúlyát. Ez a sör kiérdemli a Heineken márkanevet.</p></th>
            </tr>
        </table>
    </div>

</div>
<?php

?>
</body>
</html>
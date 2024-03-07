<?php
session_start();
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])) {
    header("Location: profile.php");
    exit();
}
include("alap.php");

fejlec();
?>
    <meta charset="UTF-8"/>
    <meta name="author" content="Tassy Zsolt"/>
    <meta name="description" content=" Egy sörfőzdét bemutató landing page."/>
    <title>SzegediSörfőzde</title>
    <link rel="stylesheet" href="CSS/style.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" href="img/logo.png" type="icon type">

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
    <main>
        <div class="contain center">
            <div class="card" style="padding: 5%">
                <form method="POST">

                    <label for="" style="color: white">Email</label>
                    <input type="text" name="befel" placeholder="email" class="logininput">

                    <label for="" style="color: white">Jelszo</label>
                    <input type="password" name="bepass" placeholder="password" class="logininput">
                    <br>
                    <button type="submit" name="login" style="padding: 0 42.5% 0 42.5%;">Belépés</button>
                    <p class="msg">Regisztrációért kattints <a href="loginPageReg.php">ide</a></p>

                </form>
            </div>
        </div>
    </main>

<?php
$accounts = loadUsers("users.txt");

$user = "";
$pass = "";
$ember = array();

if (isset($_POST["login"])) {
    $user = $_POST["befel"];
    $pass = $_POST["bepass"];

    $sikerese = false;
    foreach ($accounts as $acc) {
        if ($user === $acc["username"] && $pass === $acc["pass"]) {
            $sikerese = true;
            $ember["name"] = $acc["username"];
            $ember["age"] = $acc["age"];
            $ember["neme"] = $acc["neme"];
            $ember["img"] = $acc["img"];
            break;
        }
    }
    if ($sikerese) {
        $_SESSION["username"] = $ember;
        header("Location: profile.php");
    } else {

        echo "<span class='phphiba'>Sikertelen a belépés!</span>" . "<br>";
    }
}
?>


<?php
lablec();
?>

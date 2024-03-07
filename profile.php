<?php
session_start();
if (!isset($_SESSION["username"]) || empty($_SESSION["username"])) {
    header("Location: loginPage.php");
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
            <div class="card" style="padding: 5%; margin-top: 5%">
                <img class="profilimg" src="<?php echo $_SESSION["username"]["img"] ?>">
                <div class="content">
                    <p id="nev"> Név: <?php echo $_SESSION["username"]["name"]; ?></p>
                    <p id="nem"> Nem: <?php echo $_SESSION["username"]["neme"]; ?></p>
                    <p id="kor"> Kor: <?php echo $_SESSION["username"]["age"]; ?></p>
                    <a id="edit" href="editprofile.php">profil szerkesztése</a>
                    <form method="post">
                        <button name="delete" type="submit">Profil Törlése</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php
if (isset($_POST["delete"])){
    deleteUser($_SESSION["username"]["name"]);
    session_destroy();
    header("Location: loginPage.php");
}
lablec();
?>
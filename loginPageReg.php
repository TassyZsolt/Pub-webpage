<?php
session_start();
if(isset($_SESSION["username"]) && !empty($_SESSION["username"])){
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
    <link rel="stylesheet" href="CSS/style.css" />
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
        <div  class ="contain center">
            <div class="card" style="padding: 5%">
                <form method="post" class="register-form">
                    <input type="text" placeholder="Felhasználónév" name="felh" required>
                    <select name="neme" required>
                        <option value="Férfi">Férfi</option>
                        <option value="Nő">Nő</option>
                        <option value="Egyéb">Egyéb</option>
                    </select>
                    <input type="number" placeholder="Életkorod" name="age" required>
                    <input type="password" placeholder="Jelszó" name="pass" required>
                    <input type="password" placeholder="Jelszó ismét" name="repass" required>
                    <button type="submit" name="reg">Regisztráció </button>
                    <p class="msg" >Már van fiókod akkor kattints <a href="loginPage.php">ide</a></p>
                </form>
            </div>
        </div>
    </main>


<?php
$accounts = loadUsers("users.txt");

$user = "";
$pass = "";
$pass2 = "";
$neme = "";
$age ="";


$errors = [];

if (isset($_POST["reg"])){
    if ( $_POST["felh"] &&  $_POST["neme"]&& $_POST["pass"]&& $_POST["repass"]&& $_POST["age"]){
        $user = $_POST["felh"];
        $neme = $_POST["neme"];
        $pass = $_POST["pass"];
        $pass2 = $_POST["repass"];
        $age = $_POST["age"];
        $img = './img/profil/default.png';
    }else {
        $errors[] = "* Kötelező mező kitöltésének hiánya.";
    }

    foreach ($accounts as $acc) {
        if ( $acc["username"] === $user) {
            $errors[] = "* A felhasználó név már foglalt!";
        }
    }

    if (strlen($pass) < 5) {
        $errors[] = "* A jelszó túl rövid!";
    }

    if (!(preg_match('/[A-Za-z]/', $pass) && preg_match('/[0-9]/', $pass))) {
        $errors[] = "* A jelszónak tartalmaznia kell betűt és számjegyet is!";
    }

    if ($pass !== $pass2) {
        $errors[] = "* A két jelszó nem egyezik!";
    }
    if ($age < 18) {
        $errors[] = "* 18 év felettiek regisztrálhatnak csak. ";
    }

    if (count($errors) !== 0) {
        foreach ($errors as $error){
            echo "<span class='phphiba'>$error</span>" . "<br>";
        }
    }else {

        $data = [
            "username" => $user,
            "neme" => $neme,
            "age" => $age,
            "pass" => $pass,
            "repass" => $pass2,
            "img" => $img,
        ];


        saveUser($data);

        header("Location: profile.php");
    }
}
?>
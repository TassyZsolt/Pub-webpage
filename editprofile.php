<?php
session_start();
if(!isset($_SESSION["username"]) || empty($_SESSION["username"])){
    header("Location: longinPage.php");
    exit();
}
include("alap.php");
fejlec();

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $array = explode('.', $_FILES['image']['name']);
    $file_ext=strtolower(end($array));

    $extensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)=== false){
        $errors[]="Nem támogatott formátum";
    }

    if($file_size > 2097152) {
        $errors[]='File túl nagy';
    }

    if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"./img/profil/".$file_name);
        kepcsere("./img/profil/".$file_name);
        $_SESSION["username"]["img"] = ("/img/profil/".$file_name);
        echo "Kész";
    }else{
        print_r($errors);
    }
}
if (isset($_POST["passwordChange"])){
    $newPassword = $_POST["password"];
    updateUserPassword($_SESSION["username"]["name"],$newPassword);
}

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
    <div class="contain center">
        <div class="card" style="padding: 5%">
            <img class="profilimg" src="<?php echo $_SESSION["username"]["img"] ?>">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="image"/>
                <br>
                <br>
                <input type="submit" style="background-color: white; color: black"/>
                <br>
                <br>
            </form>
            <form method="post">
                <label>Jelszó Módosítása</label>
                <input type="password" name="password"/>
                <br>
                <br>
                <input type="submit" name="passwordChange" style="background-color: white; color: black"/>

            </form>
            <div class="content">
                <p id="nev"><?php echo $_SESSION["username"]["name"]; ?></p>
                <p id="nem"><?php echo $_SESSION["username"]["neme"]; ?></p>
                <p id="kor"><?php echo $_SESSION["username"]["age"]; ?></p>
                <a id="edit" href="profile.php">profil</a>
            </div>
        </div>
    </div>
</main>

<?php
lablec();
?>


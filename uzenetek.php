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
<style>
    #messages-container {
        display: flex;
        flex-wrap: wrap;
    }

    .message-card {
        width: 100%;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0px 0px 3px #ccc;
    }

    .message-card-header {
        padding: 10px;
        display: flex;
        align-items: center;
    }

    .profile-picture {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .message-card-body {
        padding: 10px;
    }

    .message-card-footer {
        padding: 10px;
        font-size: 12px;
        color: #888;
    }
</style>
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
<?php
if(isset($_POST["send"]) && !empty($_POST["szoveg"]) ){
    if(!isset($_SESSION["username"]) || empty($_SESSION["username"])){
        header("Location: loginPage.php");
    }else{

        $username = $_SESSION["username"]["name"];
        $ido = date("Y.m.d");
        $szovegek = $_POST["szoveg"];
        $szoveg = preg_replace("/<br>|\n/", " ", $szovegek);
        $kepcim = $_SESSION["username"]["img"];

        $tomb = [
            "nev" => $username,
            "ido" => $ido,
            "szoveg" => $szoveg,
            "kep" => $kepcim,
        ];

        saveComment($tomb);
        header("Location: uzenetek.php");
    }
}
ob_end_flush();
?>
    <main>
        <div class="contain center">
            <div class="card" style="padding: 5%">
                <form method="post">
                    <label>Üzenet: </label>
                    <textarea name="szoveg" maxlength="1500" class="texta b"></textarea>
                    <br><br>
                    <button name="send">Elküld</button>
                    <br>
                    <br>
                </form>
                <?php
                if(file_exists("velemeny.txt") && filesize("velemeny.txt") > 0 ){
                    $file = loadUsers("velemeny.txt");?>
                    <div id="messages-container">
                    <?php
                    foreach($file as $vel){?>
<!--                        <div>-->
<!--                            <div ><img src="--><?php //echo  $vel["kep"]?><!--"/></div>-->
<!--                            <div >--><?php //echo $vel["nev"]; ?><!--</div>-->
<!--                            <div >--><?php //echo $vel["ido"] ."<br>"; ?><!--</div>-->
<!--                            <div >--><?php //$szoveg = wordwrap($vel["szoveg"], 90, "<br>\n", true); echo $szoveg; ?><!--</div>-->
<!--                        </div>-->

                            <div class="message-card">
                                <div class="message-card-header">
                                    <img src="<?php echo  $vel["kep"]?>" class="profile-picture">
                                    <?php echo $vel["nev"]; ?>
                                </div>
                                <div class="message-card-body"><?php $szoveg = wordwrap($vel["szoveg"], 90, "<br>\n", true); echo $szoveg; ?></div>
                                <div class="message-card-footer"><?php echo $vel["ido"] ."<br>"; ?></div>
                            </div>
                        <?php
                    }?>
                    </div>
                <?php
                }else{
                    echo "<div class='cardnincs'>Még nem történt üzenet küldés!</div>";
                }
                ?>
            </div>
        </div>
    </main>


<?php
lablec();
?>

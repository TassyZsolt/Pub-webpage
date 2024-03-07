<?php
function loadUsers($text) {//beleptetes
    $file = fopen($text, "r");
    $felhasznalok = [];
    while (($line = fgets($file)) !== false) {
        $felhasznalok[] = unserialize($line);
    }
    fclose($file);
    return $felhasznalok;
}
function saveUser($user) {//adatfelvitel.
    $file = fopen("users.txt", "a");
    fwrite($file, serialize($user)."\n");
    fclose($file);
}function saveComment($data) {//adatfelvitel.
    $file = fopen("velemeny.txt", "a");
    fwrite($file, serialize($data)."\n");
    fclose($file);
}
function saveUsercopy($user) {//mentes copyba
    $file = fopen("copy.txt", "a");
    fwrite($file, serialize($user)."\n");
    fclose($file);
}
function saveUsercopyclean() {//urites copy
    $file = fopen("copy.txt", "w");
    fwrite($file, "");
    fclose($file);
}
function userclean() {//mentes copyba
    $file = fopen("users.txt", "w");
    fwrite($file, "");
    fclose($file);
}
function deleteUser($username) {
    $file = file("users.txt");
    $newData = "";
    foreach ($file as $line) {
        $user = unserialize($line);
        if ($user['username'] != $username) {
            $newData .= $line;
        }
    }
    file_put_contents("users.txt", $newData);
}
function updateUserPassword($username, $newPassword) {
    $file = file("users.txt");
    $newData = "";
    foreach ($file as $line) {
        $user = unserialize($line);
        if ($user['username'] == $username) {
            $user['pass'] = $newPassword;
            $line = serialize($user) . "\n";
        }
        $newData .= $line;
    }
    file_put_contents("users.txt", $newData);
}

function kepcsere($kep){
    $accounts = loadUsers("users.txt");
    foreach ($accounts as $acc) {
        $datan= [
            "username" => $acc["username"],
            "neme" => $acc["neme"] ,
            "age" => $acc["age"] ,
            "pass" => $acc["pass"] ,
            "repass" => $acc["pass"] ,
            "img" => $acc["img"],
        ];
        if ($acc["username"]  === $_SESSION["username"]["name"]) {
            $data = [
                "username" => $acc["username"],
                "neme" => $acc["neme"] ,
                "age" => $acc["age"] ,
                "pass" => $acc["pass"] ,
                "repass" => $acc["pass"] ,
                "img" => $kep,
            ];

            saveUsercopy($data);
        }else{
            saveUsercopy($datan);
        }
    }
    $dolog = loadUsers("copy.txt");
    userclean();
    foreach ($dolog as $do){
        $data = [
            "username" => $do["username"],
            "neme" => $do["neme"] ,
            "age" => $do["age"] ,
            "pass" => $do["pass"] ,
            "repass" => $do["pass"] ,
            "img" => $do["img"],
        ];
        saveUser($data);
    }
    saveUsercopyclean();

}

function fejlec() {
?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/nav_fooder.css">
    <title>Sörfőzde</title>
</head>
<body>
<?php
}
function lablec() {
?>

<footer>
    <p> © Legjobb Hely Csapata</p>
</footer>
</body>
</html>
<?php
}


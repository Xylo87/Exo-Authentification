<?php

session_start();

$password = "monMotdePasse1234";
$password2 = "monMotdePasse1234";

// Algorithmes de hashage faibles
$md5 = hash("md5", $password);
echo $md5."<br><br>";

$md5_2 = hash("md5", $password2);
echo $md5_2."<br><br>";



$sha256 = hash("sha256", $password);
echo $sha256."<br><br>";

$sha256_2 = hash("sha256", $password2);
echo $sha256_2."<br><br>";





// Algorithmes de hashage forts (bCrypt)
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash."<br><br>";

$hash_2 = password_hash($password2, PASSWORD_DEFAULT);
echo $hash_2."<br><br>";




// saisie dans le formulaire de Login
$saisie = "monMotdePasse1234";
$check = password_verify($saisie, $hash);
var_dump($check);

$user = "Xylo";
// > objet potentiel

if (password_verify($saisie, $hash)) {
    echo "Les mots de passe correspondent<br><br>";
    $_SESSION["user"] = $user;
    echo $user." est connecté";
} else {
    echo "Les mots de passe sont différents";
}
// > utilisateur va être mis en $_SESSION > objet qui représente utilisateur va être stocké en $_SESSION
// > unset($_SESSION["user"]) pour purge de $_SESSION > deconnexion
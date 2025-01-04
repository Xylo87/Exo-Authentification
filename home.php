<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        if (isset($_SESSION["user"])) { ?>
            <a href="traitement.php?action=logout">Se déconnecter</a>
            <br>
            <a href="traitement.php?action=profil">Mon profil</a>
        
        <?php } else { ?>
            <a href="traitement.php?action=login">Se connecter</a>
            <br>
            <a href="traitement.php?action=register">S'inscrire</a>

        <?php } ?>
    <h1>Acceuil</h1>
    <?php 
        if (isset($_SESSION["user"])) {
            echo "<p>Bienvenue ".$_SESSION["user"]["pseudo"]." !</p>";
        }
    ?>
</body>
</html>

<?php

if (isset($_GET["success"])) {
    if ($_GET["success"] === "logout") {
        echo "<br><br>Déconnexion réussie !";
    }
}

?>
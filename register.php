<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>S'inscrire</h1>
    <form action="traitement.php?action=register" method="post">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo"><br>

        <label for="email">Mail</label>
        <input type="email" name="email" id="email"><br>

        <label for="pass1">Mot de passe</label>
        <input type="password" name="pass1" id="pass1"><br>

        <label for="pass2">Confirmation du mot de passe</label>
        <input type="password" name="pass2" id="pass2"><br><br>
        <input type="submit" name="submit" value="S'enregistrer">
    </form>
</body>
</html>

<?php 

if (isset($_GET["success"])) {
    if ($_GET["success"] === "exist") {
        echo "<br><br>L'utilisateur existe déjà !";
    } elseif ($_GET["success"] === "passwordError") {
         echo "<br><br>Les mots de passe ne sont pas identiques ou le mot de passe est trop court...";
    } elseif ($_GET["success"] === "inputError") {
        echo "<br><br>Erreur de saisie";
    }
}
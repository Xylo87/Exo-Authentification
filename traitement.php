<?php

session_start();

// verification que l'action est définie dans l'URL
if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case 'register':
                
            if($_POST["submit"]) {

                $pdo = new PDO("mysql:host=localhost; dbname=auth; charset=utf8", "root", "");
                
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
                $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if ($pseudo && $email && $pass1 && $pass2) {
                    // var_dump("ok");die;
                    $requete = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                    $requete->execute(["email" => $email]);
                    $user = $requete->fetch();
                    // si l'utilisateur existe
                    if ($user) {
                        header("Location:register.php?success=exist"); die;
                    } else {
                        // var_dump("utilisateur inexistant");die;

                        
                        // insertion de l'utilisateur en base de données

                        // mise en place d'un REGEX possible à ce niveau
                        if ($pass1 === $pass2 && strlen($pass1) >= 5) {
                            $insertUser = $pdo->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)");
                            $insertUser->execute([
                                "pseudo" => $pseudo,
                                "email" => $email,
                                "password" => password_hash($pass1, PASSWORD_DEFAULT),
                            ]);
                            header("Location:login.php?success=registerOk"); die;
                        } else {
                            header("Location:register.php?success=passwordError"); die;
                        }
                    }
                } else {
                    header("Location:register.php?success=inputError"); die;
                }
            }
            
            header("Location: register.php"); die;

        break;
        
        case 'login':
        
            if ($_POST["submit"]) {
                
                $pdo = new PDO("mysql:host=localhost; dbname=auth; charset=utf8", "root", "");

                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if ($email && $password) {
                    $requete = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                    $requete->execute(["email" => $email]);
                    $user = $requete->fetch();
                    if($user) {
                        $hash = $user["password"];
                        if (password_verify($password, $hash)) {
                            // stockage en session d'un tableau appellé "user" qui stocke l'intégralité des infos de la BdD le concernant
                            $_SESSION["user"] = $user;
                            header("Location: home.php");die;
                            // redirections Framework
                            // > header("Location : index.php?ctrl=home&action=index&id=...")
                        } else {
                            header("Location: login.php?success=noConnect"); die;
                        }
                    } else {
                        header("Location: login.php?success=noConnect"); die;
                    }
                }
            }
            header("Location: login.php"); die;
        break;

        case 'profil':
            header("Location: profil.php"); die;

        break;
        
        case 'logout':
           unset($_SESSION["user"]);
           header("Location: home.php?success=logout"); die;

        break;
    }
}
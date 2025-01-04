# ⚡🔑 Exercice d'authentification en PHP

## 1. Description
Ce projet est un exercice pratique axé sur l'authentification avec **PHP** : il traite du fonctionnement d'un **register** (inscription) et d'un **login/logout** (connexion/déconnexion) pour les utilisateurs.
L'inscription donne lieu à un enregistrement des informations de l'utilisateur en base de données **MySQL** (pseudonyme, e-mail, mot de passe) en usant d'un algorithme de hachage fort (**bcrypt**) pour la sauvegarde du **password**.
Le **Login** permet d'enregistrer les informations relatives à l'utilisateur en `$_SESSION`.

---

## 2. Fonctionnalités
- Navigation entre les différentes **Vues** (accueil/home, login, register etc.) à l'aide d'une **Navbar** sommaire.
- Formulaires HTML de **Register** et de **Login** traités en méthode `$_POST`.
- Lien de déconnexion de la `$_SESSION`(**unset**).
- Messages dynamiques de succès ou d'échec des différentes opérations.
- **Vue** dédiée au profil utilisateur : affichage des informations le concernant (pseudo + email).

---

## 3. Installation 

1. Clonez ce projet depuis GitHub :
   ```bash
   git clone https://github.com/Xylo87/Exo-Authentification.git
   cd Exo-Authentification
   ```
2. Assurez-vous que PHP est installé sur votre machine en exécutant la commande suivante :
   ```bash
   php --version
   ```

3. Installer un logiciel type "Laragon" pour disposer d'un environnement qui permet d'exécuter un script PHP :

- Télécharger Laragon [ici](https://laragon.org/download/)
- Démarrer Laragon
- Enregistrer le "Repo" dans le dossier laragon\www\
- Exécuter la fonction "Web" de Laragon

4. Pour commencer la navigation, veuillez exécuter la requête suivante dans la barre d'URL :
   ```bash
   php http://localhost/Exo-Authentification/home.php
   ```

---

## 4. Auteur
Ce projet a été réalisé par Théo Arbogast (aka Xylo87).  
N'hésitez pas à ouvrir une issue ou à me contacter pour toute suggestion ou question.




<?php
require '../../vendor/autoload.php';

use App\Controller\AccountManager\RegisterAccount;
use App\Controller\accountController;

if (isset($_POST['register'])) {
    $error = [];
    $registerController = new accountController();
    $registerController->control($_POST);
    $test = null;
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css" type="text/css" media="screen"/>
    <title>Twitch - S'inscrire</title>
</head>
<body>
<div class="modal">
    <div class="informationModal">
        <div class="headerModal">
            <img src="../asset/img/twitchLogo.png">
            <h1>Se connecter à Twitch</h1>
        </div>
        <div class="switchModal">
            <div class="switchText">
                <div class="signInContent">
                    <input type="radio" id="signIn" name="switchLogin">
                    <label for="signIn" class="signInLabel">Se connecter</label>
                    <div class="selectedSignIn"></div>
                </div>
                <div class="signUpContent">
                    <input type="radio" id="signUp" checked name="switchLogin">
                    <label for="signUp" class="signUpLabel">S'inscrire</label>
                    <div class="selectedSignUp"></div>
                </div>
            </div>
        </div>
        <form method="post">
            <div class="contentForm">
                <div class="usernameContent">
                    <p>Nom d'utilisateur</p>
                    <input required type="text" placeholder="Exemple" name="username">
                </div>
                <div class="passwordContent">
                    <p>Mot de passe</p>
                    <input required type="password" placeholder="Exemple" name="password">
                </div>
                <a href="#">Problèmes de connexion ?</a>
                <input type="submit" name="connection">
            </div>
        </form>
    </div>
</div>
</body>
</html>
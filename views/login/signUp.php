<?php
require '../../vendor/autoload.php';

use App\Controller\accountController;

$errors = [];
$months = [
        '1' => 'Janvier',
        '2' => 'Février',
        '3' => 'Mars',
        '4' => 'Avril',
        '5' => 'Mai',
        '6' => 'Juin',
        '7' => 'Juillet',
        '8' => 'Août',
        '9' => 'Septembre',
        '10' => 'Octobre',
        '11' => 'Novembre',
        '12' => 'Decembre'
];

if (isset($_POST['register'])) {
    $registerController = new accountController();
    $errors = $registerController->createAccount($_POST);
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
            <h1>Rejoignez Twitch dès maintenant !</h1>
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
        <?php
        if (array_key_exists('email', $errors)):
            ?>
            <div class="errorsContent">
                <div class="errorBox">
                    <img src="../asset/img/interdiction_icon.png"/>
                    <p> <?php echo $errors['email']; ?> </p>
                </div>
            </div>
        <?php endif; ?>
        <form method="post">
            <div class="contentForm">
                <div class="usernameContentSignUp">
                    <p>Nom d'utilisateur</p>
                    <input class="<?php if (array_key_exists('user', $errors)) {
                        echo 'error';
                    } ?>"
                           required type="text" name="username" value="<?php if (isset($_POST['register'])) {
                        echo $_POST['username'];
                    } ?>">
                    <?php if(array_key_exists('user', $errors)) :?>
                    <p class="errorMsg"> <?= $errors['user'] ?></p>
                    <?php endif;?>
                    <p class="userInformation">Il s'agit du nom sous lequel les autres vous connaîtront sur Twitch. <br>Vous
                        pourrez toujours le modifier plus tard.</p>
                </div>
                <div class="passwordContent">
                    <p>Mot de passe</p>
                    <input class="<?php if (array_key_exists('password', $errors)) {
                        echo 'error';
                    } ?>" required type="password" name="password">
                    <?php if(array_key_exists('password', $errors)) :?>
                        <p class="errorMsg"> <?= $errors['password'] ?></p>
                    <?php endif;?>
                </div>
                <div class="confirmPasswordContent">
                    <p>Confirmer le mot de passe</p>
                    <input class="<?= array_key_exists('password', $errors) ? 'error': '' ?>" required type="password" name="confirmPassword">

                </div>
                <div class="birthdateContent">
                    <p>Date de naisssance</p>
                    <div class="birthdateInput <?= array_key_exists('birthdate', $errors) ? 'error': '' ?>">
                        <input class="<?php if (array_key_exists('birthdate', $errors)) {
                            echo 'error';
                        } ?>" placeholder="Jour" required type="number" name="birthdayDay" min="1"
                               max="31" value="<?php if(isset($_POST['register'])) {
                            echo $_POST['birthdayDay'];
                        } ?>">
                        <select class="<?php if (array_key_exists('birthdate', $errors)) {
                            echo 'error';
                        } ?>" required name="birthdayMonth">
                            <option <?= !isset($_POST['birthdayMonth']) ? 'selected=selected' : ''?> value="0" disabled>Mois</option>
                            <?php foreach($months as $idMonth => $month):?>
                                <option <?= isset($_POST['birthdayMonth']) && (int)$_POST['birthdayMonth'] == $idMonth ? 'selected=selected' : ''?> value="<?= $idMonth ?>"><?= $month ?></option>
                            <?php endforeach;?>
                        </select>
                        <input class="<?php if (array_key_exists('birthdate', $errors)) {
                            echo 'error';
                        } ?>" placeholder="Année" required type="number" name="birthdayYear"
                               min="1901" max="2021" value="<?php if (isset($_POST['register'])) {
                            echo $_POST['birthdayYear'];
                        } ?>">
                    </div>
                    <?php if(array_key_exists('birthdate', $errors)) :?>
                        <p class="errorMsg"> <?= $errors['birthdate'] ?></p>
                    <?php endif;?>
                </div>
                <div class="mailContent">
                    <p>Adresse mail</p>
                    <input class="<?php if (array_key_exists('email', $errors)) {
                        echo 'error';
                    } ?>" required type="email" name="email" value="<?php if (isset($_POST['register'])) {
                        echo $_POST['email'];
                    } ?>">

                </div>
                <p class="politiqueUser">En cliquant sur S'inscrire, vous reconnaissez avoir lu et approuvé<br>les <a
                            href="#"> Conditions d’utilisation</a> et la <a href="#">Politique de confidentialité</a>.
                </p>
                <input type="submit" name="register" value="S'inscrire">
            </div>
        </form>
    </div>
</div>
</body>
</html>
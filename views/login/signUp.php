<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twitch - S'inscrire</title>
</head>
<body>
<form method="post" action="../../source/Controller/Security/register.php">
    <p>Nom d'utilisateur</p><input type="text" placeholder="Exemple" name="username">
    <br>
    <p>Mot de passe</p><input type="password" placeholder="Exemple" name="password">
    <br>
    <p>Confirmer le mot de passe</p>
    <input type="password" placeholder="Exemple"  name="confirmPassword">
    <br>
    <p>Date de naisssance</p>
    <input type="number"  name="birthdayDay">
    <select name="birthdayMonth">
        <option selected disabled>Selectionner un mois</option>
        <option>Janvier</option>
        <option>Février</option>
        <option>Mars</option>
        <option>Avril</option>
        <option>Mai</option>
        <option>Juin</option>
        <option>Juillet</option>
        <option>Août</option>
        <option>Septembre</option>
        <option>Octobre</option>
        <option>Novembre</option>
        <option>Decembre</option>
    </select>
    <input type="number" name="birthdayYear">
</form>
</body>
</html>
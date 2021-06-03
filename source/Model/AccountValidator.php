<?php

namespace App\Model;

use App\Model\AccountManager;
use App\Model\Account;
use DateTime;

class AccountValidator extends Account
{

    protected $userInfo;

    /**
     * @throws \Exception
     */
    public function validate(array $post): array
    {
        $manager = new AccountManager();
        $errorsRegistration = [];
        $birthDate = new DateTime($post['birthdayYear'].'-'.$post['birthdayMonth'].'-'.$post['birthdayDay']);

        if ($manager->isUserExist($post['username']) || !is_string($post['username'])) {
            $errorsRegistration['user'] = '*Ce nom d\'utilisateur existe déjà.';
        }
        if (!$this->isSamePasseword($post['password'], $post['confirmPassword']) || !is_string($post['password'])) {
            $errorsRegistration['password'] = '*Les mots de passe ne correspondent pas.';
        }
        if ($manager->isMailExist($post['email']) || !filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errorsRegistration['email'] = 'Veuillez saisir une adresse mail différente.';
        }
        if (!$this->isAuthorizedAge($birthDate)) {
            $errorsRegistration['birthdate'] = '*Vous êtes trop jeune pour souscrire à Twitch.';
        }

        $userInfo = [
            'login' => $post['username'],
            'password' => $post['password'],
            'confirmPassword' => $post['confirmPassword'],
            'email' => $post['email'],
            'birthday' => $birthDate
        ];
        $this->userInfo = $userInfo;

        return $errorsRegistration;
    }

    public function setInformationRegister(): void
    {
        $this->setLogin($this->userInfo['login']);
        $password = password_hash($this->userInfo['password'], PASSWORD_ARGON2I);
        $this->setPassword($password);
        //$password2 = password_verify($this->userInfo['password'], $password);
        $this->setEmail($this->userInfo['email']);
        $this->setBirthday($this->userInfo['birthday']);
        $this->setCreatedAt((new DateTime('now')));
    }

    public function createAccount()
    {
        $this->setInformationRegister();
        $manager = new AccountManager();
        $manager->insertAccount($this);

    }

    /**
     * @param $login
     * @return bool
     */
    protected function isSamePasseword(string $password1, string $password2): bool
    {
        return $password1 === $password2;
    }

    /**
     * @param DateTime $birthday
     * @return bool
     */
    protected function isAuthorizedAge(DateTime $birthday)
    {
        $today = new DateTime();
        $interval = $birthday->diff($today);
        return $interval->y >= 13;
    }
}
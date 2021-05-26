<?php

namespace App\Controller\AccountManager;

use App\Model\Account;
use Cassandra\Date;
use DateTime;

class RegisterAccount extends Account
{

    protected $userInfo;

    /**
     * RegisterAccount constructor.
     * @param array $userInfo
     */
    public function __construct(array $userInfo)
    {
        $this->userInfo = $userInfo;
    }

    public function setInformation(): string
    {
        if (!$this->isUserExist($this->userInfo['profil'])) {
            //TODO : set l'user dans account
        } else {
            return 'userExist';
        }

        if ($this->isSamePasseword($this->userInfo['password'], $this->userInfo['confirmPassword'])) {
            //TODO : hasher le password puis le set dans account
        } else {
            return 'wrongPassword';
        }

        if ($this->isMailExist($this->userInfo['email'])) {
            //TODO : set l'email dans account
        } else {
            return 'mailExist';
        }

        if ($this->isAuthorizedAge($this->userInfo['birthday'])) {

        } else {
            return 'vaJouerAuxVoitures';
        }
    }

    /**
     * @param $login
     * @return bool
     */
    protected function isUserExist(string $login): bool
    {

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

    /**
     * @param string $email
     */
    protected function isMailExist(string $email): bool
    {
    }
}
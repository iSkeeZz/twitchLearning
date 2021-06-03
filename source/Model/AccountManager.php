<?php

namespace App\Model;

use App\Model\Bdd;
use PDO;

class AccountManager extends Bdd{

    /**
     * @param string $login
     * @return bool
     */
    public function isUserExist(string $login): bool
    {
        $requestUserExist = $this->bdd->prepare('SELECT login FROM profils WHERE login = :login');
        $requestUserExist->bindParam(':login', $login, PDO::PARAM_STR);
        $requestUserExist->execute();
        return is_array($requestUserExist->fetch());
    }

    /**
     * @param string $email
     */
    public function isMailExist(string $email): bool
    {
        $requestMailExist = $this->bdd->prepare('SELECT email FROM profils WHERE email = :email');
        $requestMailExist->bindParam(':email', $email, PDO::PARAM_STR);
        $requestMailExist->execute();
        return is_array($requestMailExist->fetch());
    }

    public function insertAccount(Account $account){
        $requestInsertUser = $this->bdd->prepare('INSERT INTO profils(login, password, email, display_name, birthday, created_at)
                                                        VALUES (:login, :password, :email, :login, :birthday, :createdAt)');
        $requestInsertUser->execute([':login' => $account->getLogin(),
            ':password' => $account->getPassword(),
            ':email' => $account->getEmail(),
            ':birthday' => $account->getBirthday(),
            ':createdAt' => $account->getCreatedAt()
            ]);
    }
}
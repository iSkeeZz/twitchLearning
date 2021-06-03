<?php

namespace App\Controller;

use App\Model\Account;
use App\Model\AccountManager;
use App\Model\AccountValidator;
use App\Model\Bdd;
use DateTime;
use Exception;

class accountController {

    protected $accountValidator;
    protected $accountManager;

    public function __construct()
    {
        $this->accountValidator = new AccountValidator();
        $this->accountManager = new AccountManager();
    }

    /**
     * @param array $post
     * @return array
     * @throws Exception
     */
    public function createAccount(array $post): array
    {
        $errors = null;
        $errors = $this->accountValidator->validate($post);
        if (empty($errors)){
            $this->accountValidator->setInformationRegister();
            $this->accountManager->insertAccount($this->accountValidator);
//            header('Location: ../homepage/index.php');
        }
        return $errors;
    }
}
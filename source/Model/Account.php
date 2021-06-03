<?php
namespace App\Model;

use DateTime;

class Account {

    protected string $login;
    protected string $password;
    protected string $email;
    protected DateTime $birthday;
    protected DateTime $createdAt;

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    /**
     * @param DateTime $createdAt
     * @return Account
     */
    public function setCreatedAt(DateTime $createdAt): Account
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return Account
     */
    public function setLogin(string $login): Account
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Account
     */
    public function setPassword(string $password): Account
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Account
     */
    public function setEmail(string $email): Account
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {

        return $this->birthday->format('Y-m-d H:i:s');
    }

    /**
     * @param DateTime $birthday
     * @return Account
     */
    public function setBirthday(DateTime $birthday): Account
    {
        $this->birthday = $birthday;
        return $this;
    }
}

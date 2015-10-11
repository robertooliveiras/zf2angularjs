<?php

namespace SONUser\Auth;

use DoctrineORMModule\Options\EntityManager;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

class DoctrineAdapter implements AdapterInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    protected $username;
    protected $password;

    public function __construct (EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        $repository = $this->em->getRepository('SONUser\Entity\User');
        $user = $repository->findByOne(array('username'=>$this->getUsername(),'password'=>$this->getPassword()));

        if ($user) {
            return new Result(Result::SUCCESS, array('user'=>$user), array('OK'));
        } else {
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array());
        }
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return DoctrineAdapter
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return DoctrineAdapter
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

}
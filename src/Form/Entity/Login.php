<?php

namespace Bolt\Extension\Europeana\MembersAddon\Form\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * User password login object class
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class Login
{
    /** string */
    protected $email;
    /** string */
    protected $password;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return Register
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
     *
     * @return Register
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}

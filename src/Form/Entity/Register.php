<?php

namespace Bolt\Extension\Europeana\MembersAddon\Form\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * User registration object class
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class Register
{
    /** string */
    protected $email;
    /** string */
    protected $displayName;

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
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param mixed $displayName
     *
     * @return Register
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }
}

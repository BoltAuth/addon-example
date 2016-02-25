<?php

namespace Bolt\Extension\Europeana\MembersAddons\Form\Entity;

use Bolt\Extension\Bolt\Members\Form\Entity\ProfileEdit as MembersProfileEdit;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User profile object class
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class ProfileEdit extends MembersProfileEdit
{
    /** @var string */
    protected $twitterHandle;
    /** @var string */
    protected $website;
    /** @var string */
    protected $biography;
    /** @var string */
    protected $addressStreet;
    /** @var string */
    protected $addressStreetMeta;
    /** @var string */
    protected $addressCity;
    /** @var string */
    protected $addressState;
    /** @var string */
    protected $addressCountry;
    /** @var string */
    protected $phoneNumber;

    /**
     * @return string
     */
    public function getTwitterHandle()
    {
        return $this->twitterHandle;
    }

    /**
     * @param string $twitterHandle
     *
     * @return ProfileEdit
     */
    public function setTwitterHandle($twitterHandle)
    {
        $this->twitterHandle = $twitterHandle;

        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     *
     * @return ProfileEdit
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     *
     * @return ProfileEdit
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressStreet()
    {
        return $this->addressStreet;
    }

    /**
     * @param string $addressStreet
     *
     * @return ProfileEdit
     */
    public function setAddressStreet($addressStreet)
    {
        $this->addressStreet = $addressStreet;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressStreetMeta()
    {
        return $this->addressStreetMeta;
    }

    /**
     * @param string $addressStreetMeta
     *
     * @return ProfileEdit
     */
    public function setAddressStreetMeta($addressStreetMeta)
    {
        $this->addressStreetMeta = $addressStreetMeta;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressCity()
    {
        return $this->addressCity;
    }

    /**
     * @param string $addressCity
     *
     * @return ProfileEdit
     */
    public function setAddressCity($addressCity)
    {
        $this->addressCity = $addressCity;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressState()
    {
        return $this->addressState;
    }

    /**
     * @param string $addressState
     *
     * @return ProfileEdit
     */
    public function setAddressState($addressState)
    {
        $this->addressState = $addressState;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * @param string $addressCountry
     *
     * @return ProfileEdit
     */
    public function setAddressCountry($addressCountry)
    {
        $this->addressCountry = $addressCountry;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return ProfileEdit
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}

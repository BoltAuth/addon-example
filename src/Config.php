<?php

namespace Bolt\Extension\Europeana\MembersAddons;

/**
 * Config class.
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class Config
{
    /** @var boolean */
    protected $websiteRequired;
    /** @var boolean */
    protected $twitterHandleRequired;
    /** @var boolean */
    protected $biographyRequired;
    /** @var boolean */
    protected $addressStreetRequired;
    /** @var boolean */
    protected $addressStreetMetaRequired;
    /** @var boolean */
    protected $addressCityRequired;
    /** @var boolean */
    protected $addressStateRequired;
    /** @var boolean */
    protected $addressCountryRequired;
    /** @var boolean */
    protected $phoneNumberRequired;

    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $this->website = $config['website']['required'];
        $this->twitterHandle = $config['twitter_handle']['required'];
        $this->biography = $config['biography']['required'];
        $this->addressStreet = $config['address_street']['required'];
        $this->addressStreetMeta = $config['address_street_meta']['required'];
        $this->addressCity = $config['address_city']['required'];
        $this->addressState = $config['address_State']['required'];
        $this->addressCountry = $config['address_country']['required'];
        $this->phoneNumber = $config['phone_number']['required'];
    }

    /**
     * @return boolean
     */
    public function isWebsiteRequired()
    {
        return $this->websiteRequired;
    }

    /**
     * @return boolean
     */
    public function isTwitterHandleRequired()
    {
        return $this->twitterHandleRequired;
    }

    /**
     * @return boolean
     */
    public function isBiographyRequired()
    {
        return $this->biographyRequired;
    }

    /**
     * @return boolean
     */
    public function isAddressStreetRequired()
    {
        return $this->addressStreetRequired;
    }

    /**
     * @return boolean
     */
    public function isAddressStreetMetaRequired()
    {
        return $this->addressStreetMetaRequired;
    }

    /**
     * @return boolean
     */
    public function isAddressCityRequired()
    {
        return $this->addressCityRequired;
    }

    /**
     * @return boolean
     */
    public function isAddressStateRequired()
    {
        return $this->addressStateRequired;
    }

    /**
     * @return boolean
     */
    public function isAddressCountryRequired()
    {
        return $this->addressCountryRequired;
    }

    /**
     * @return boolean
     */
    public function isPhoneNumberRequired()
    {
        return $this->phoneNumberRequired;
    }
}

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
    protected $firstNameRequired;
    /** @var boolean */
    protected $lastNameRequired;
    /** @var boolean */
    protected $organisationRequired;
    /** @var boolean */
    protected $organisationUrlRequired;
    /** @var boolean */
    protected $professionRequired;
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
        $profileFields = $config['meta_fields']['profile'];

        $this->firstNameRequired = $profileFields['first_name']['required'];
        $this->lastNameRequired = $profileFields['last_name']['required'];
        $this->organisationRequired = $profileFields['organisation']['required'];
        $this->organisationUrlRequired = $profileFields['organisation_url']['required'];
        $this->professionRequired = $profileFields['profession']['required'];
        $this->websiteRequired = $profileFields['website']['required'];
        $this->twitterHandleRequired = $profileFields['twitter_handle']['required'];
        $this->biographyRequired = $profileFields['biography']['required'];
        $this->addressStreetRequired = $profileFields['address_street']['required'];
        $this->addressStreetMetaRequired = $profileFields['address_street_meta']['required'];
        $this->addressCityRequired = $profileFields['address_city']['required'];
        $this->addressStateRequired = $profileFields['address_state']['required'];
        $this->addressCountryRequired = $profileFields['address_country']['required'];
        $this->phoneNumberRequired = $profileFields['phone_number']['required'];
    }

    /**
     * @return boolean
     */
    public function isFirstNameRequired()
    {
        return $this->firstNameRequired;
    }

    /**
     * @return boolean
     */
    public function isLastNameRequired()
    {
        return $this->lastNameRequired;
    }

    /**
     * @return boolean
     */
    public function isOrganisationRequired()
    {
        return $this->organisationRequired;
    }

    /**
     * @return boolean
     */
    public function isOrganisationUrlRequired()
    {
        return $this->organisationUrlRequired;
    }

    /**
     * @return boolean
     */
    public function isProfessionRequired()
    {
        return $this->professionRequired;
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

<?php

namespace Bolt\Extension\Europeana\MembersAddons\Form\Type;

use Bolt\Extension\Bolt\Members\Form\Type\ProfileEditType as MembersProfileEditType;
use Bolt\Extension\Europeana\MembersAddons\Config;
use Bolt\Translation\Translator as Trans;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Profile type
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class ProfileEditType extends MembersProfileEditType
{
    /** @var Config */
    protected $localConfig;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('first_name', Type\TextType::class,   [
                'label'       => Trans::__('First Name:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isFirstNameRequired(),
            ])
            ->add('last_name', Type\TextType::class,   [
                'label'       => Trans::__('Last Name:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isLastNameRequired(),
            ])
            ->add('organisation', Type\TextType::class,   [
                'label'       => Trans::__('Organisation:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isOrganisationRequired(),
            ])
            ->add('organisation_url', Type\TextType::class,   [
                'label'       => Trans::__('Organisation URL:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isOrganisationUrlRequired(),
            ])
            ->add('profession', Type\TextType::class,   [
                'label'       => Trans::__('Profession:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isProfessionRequired(),
            ])
            ->add('website', Type\TextType::class,   [
                'label'       => Trans::__('Website URL:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isWebsiteRequired(),
            ])
            ->add('twitter_handle', Type\TextType::class,   [
                'label'       => Trans::__('Twitter Name:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isTwitterHandleRequired(),
            ])
            ->add('biography', Type\TextareaType::class,   [
                'label'       => Trans::__('Biography:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isBiographyRequired(),
            ])
            ->add('address_street', Type\TextType::class,   [
                'label'       => Trans::__('Street Address:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressStreetRequired(),
            ])
            ->add('address_street_meta', Type\TextType::class,   [
                'label'       => null,
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressStreetMetaRequired(),
            ])
            ->add('address_city', Type\TextType::class,   [
                'label'       => Trans::__('City:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressCityRequired(),
            ])
            ->add('address_state', Type\TextType::class,   [
                'label'       => Trans::__('Province / state / arrondissement:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressStateRequired(),
            ])
            ->add('address_country', Type\TextType::class,   [
                'label'       => Trans::__('Country:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressCountryRequired(),
            ])
            ->add('phone_number', Type\TextType::class,   [
                'label'       => Trans::__('Phone number:'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isPhoneNumberRequired(),
            ])
            ->add('submit',      'submit', [
                'label'   => Trans::__('Save & continue'),
            ]);
    }

    public function setLocalConfig(Config $config)
    {
        $this->localConfig = $config;
    }
}

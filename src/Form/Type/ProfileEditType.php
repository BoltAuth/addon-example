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
            ->add('website', Type\TextType::class,   [
                'label'       => Trans::__('Website URL:'),
                'data'        => $this->getData($options, 'website'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isWebsiteRequired(),
            ])
            ->add('twitter_handle', Type\TextType::class,   [
                'label'       => Trans::__('Twitter Name:'),
                'data'        => $this->getData($options, 'twitter_handle'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isTwitterHandleRequired(),
            ])
            ->add('biography', Type\TextareaType::class,   [
                'label'       => Trans::__('Biography:'),
                'data'        => $this->getData($options, 'biography'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isBiographyRequired(),
            ])
            ->add('address_street', Type\TextType::class,   [
                'label'       => Trans::__('Street Address:'),
                'data'        => $this->getData($options, 'address_street'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressStreetRequired(),
            ])
            ->add('address_street_meta', Type\TextType::class,   [
                'label'       => null,
                'data'        => $this->getData($options, 'address_street_meta'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressStreetMetaRequired(),
            ])
            ->add('address_city', Type\TextType::class,   [
                'label'       => Trans::__('City:'),
                'data'        => $this->getData($options, 'address_city'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressCityRequired(),
            ])
            ->add('address_state', Type\TextType::class,   [
                'label'       => Trans::__('Province / state / arrondissement:'),
                'data'        => $this->getData($options, 'address_state'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressStateRequired(),
            ])
            ->add('address_country', Type\TextType::class,   [
                'label'       => Trans::__('Country:'),
                'data'        => $this->getData($options, 'address_country'),
                'constraints' => [
                ],
                'required'    => $this->localConfig->isAddressCountryRequired(),
            ])
            ->add('phone_number', Type\TextType::class,   [
                'label'       => Trans::__('Phone number:'),
                'data'        => $this->getData($options, 'phone_number'),
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

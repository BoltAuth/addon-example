<?php

namespace Bolt\Extension\Europeana\MembersAddons\Form\Type;

use Bolt\Translation\Translator as Trans;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Profile type
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class ProfileType extends AbstractType
{
    /** @var boolean */
    protected $requirePassword = true;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('displayname', Type\TextType::class,   [
                'label'       => Trans::__('Public name:'),
                'data'        => $this->getData($options, 'displayname'),
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 2]),
                ],
            ])
            ->add('email',       Type\EmailType::class,   [
                'label'       => Trans::__('Email:'),
                'data'        => $this->getData($options, 'email'),
                'constraints' => new Assert\Email([
                    'message' => 'The address "{{ value }}" is not a valid email.',
                    'checkMX' => true,
                ]),
            ])
            ->add('plainPassword', Type\RepeatedType::class, [
                'type' => Type\PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
                'empty_data'     => null,
                'required'       => $this->requirePassword,
            ])
            ->add('website', Type\TextType::class,   [
                'label'       => Trans::__('Website URL:'),
                'data'        => $this->getData($options, 'website'),
                'constraints' => [
                ],
            ])
            ->add('twitter_handle', Type\TextType::class,   [
                'label'       => Trans::__('Twitter Name:'),
                'data'        => $this->getData($options, 'twitter_handle'),
                'constraints' => [
                ],
            ])
            ->add('biography', Type\TextareaType::class,   [
                'label'       => Trans::__('Biography:'),
                'data'        => $this->getData($options, 'biography'),
                'constraints' => [
                ],
            ])
            ->add('address_street', Type\TextType::class,   [
                'label'       => Trans::__('Street Address:'),
                'data'        => $this->getData($options, 'address_street'),
                'constraints' => [
                ],
            ])
            ->add('address_street_meta', Type\TextType::class,   [
                'label'       => null,
                'data'        => $this->getData($options, 'address_street_meta'),
                'constraints' => [
                ],
            ])
            ->add('address_city', Type\TextType::class,   [
                'label'       => Trans::__('City:'),
                'data'        => $this->getData($options, 'address_city'),
                'constraints' => [
                ],
            ])
            ->add('address_state', Type\TextType::class,   [
                'label'       => Trans::__('Province / state / arrondissement:'),
                'data'        => $this->getData($options, 'address_state'),
                'constraints' => [
                ],
            ])
            ->add('address_country', Type\TextType::class,   [
                'label'       => Trans::__('Country:'),
                'data'        => $this->getData($options, 'address_country'),
                'constraints' => [
                ],
            ])
            ->add('phone_number', Type\TextType::class,   [
                'label'       => Trans::__('Phone number:'),
                'data'        => $this->getData($options, 'phone_number'),
                'constraints' => [
                ],
            ])
            ->add('submit',      'submit', [
                'label'   => Trans::__('Save & continue'),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'profile';
    }

    /**
     * @param array  $options
     * @param string $field
     *
     * @return mixed|null
     */
    private function getData(array $options, $field)
    {
        if (!isset($options['data'])) {
            return null;
        }

        return isset($options['data'][$field]) ? $options['data'][$field] : null;
    }

    /**
     * @param boolean $requirePassword
     *
     * @return ProfileType
     */
    public function setRequirePassword($requirePassword)
    {
        $this->requirePassword = $requirePassword;

        return $this;
    }
}

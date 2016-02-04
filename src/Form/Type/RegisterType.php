<?php

namespace Bolt\Extension\Europeana\MembersAddon\Form\Type;

use Bolt\Extension\Bolt\Members\Form\Validator\Constraint\UniqueEmail;
use Bolt\Extension\Bolt\Members\Storage\Records;
use Bolt\Translation\Translator as Trans;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User registration type
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class RegisterType extends AbstractType
{
    /** @var Records */
    private $records;

    /**
     * Constructor.
     *
     * @param Records $records
     * @param mixed   $options
     */
    public function __construct(Records $records, $options = null)
    {
        $this->records = $records;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('displayname', TextType::class,   [
                'label'       => Trans::__('Publicly visible name:'),
                'data'        => isset($options['data']['displayname']) ? $options['data']['displayname'] : null,
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 2]),
                ],
            ])
            ->add('email',       EmailType::class,   [
                'label'       => Trans::__('Email:'),
                'data'        => isset($options['data']['email']) ? $options['data']['email'] : null,
                'constraints' => [
                    new UniqueEmail($this->records),
                    new Assert\Email([
                        'message' => 'The address "{{ value }}" is not a valid email.',
                        'checkMX' => true,
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ])
            ->add('submit',      'submit', [
                'label'       => Trans::__('Save & continue'),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'register';
    }
}

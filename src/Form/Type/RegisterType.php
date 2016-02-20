<?php

namespace Bolt\Extension\Europeana\MembersAddons\Form\Type;

use Bolt\Extension\Bolt\Members\Form\Type\RegisterType as MembersRegisterType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User registration type
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class RegisterType extends MembersRegisterType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }
}

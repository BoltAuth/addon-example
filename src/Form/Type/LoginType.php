<?php

namespace Bolt\Extension\Europeana\MembersAddons\Form\Type;

use Bolt\Extension\Bolt\Members\Form\Type\LoginType as MembersLoginType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Login type
 *
 * Copyright (C) 2014-2016 Gawain Lynch
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class LoginType extends MembersLoginType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }

    public function getName()
    {
        return 'login';
    }
}

<?php

namespace Bolt\Extension\Europeana\MembersAddons\Form\Type;

use Bolt\Extension\Bolt\Members\Form\Type\LogoutType as MembersLogoutType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Logout type.
 *
 * @author    Gawain Lynch <gawain.lynch@gmail.com>
 */
class LogoutType extends MembersLogoutType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }
}

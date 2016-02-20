<?php

namespace Bolt\Extension\Europeana\MembersAddons\Form\Type;

use Bolt\Extension\Bolt\Members\Form\Type\AssociateType as MembersAssociateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Associate social media type.
 *
 * @author    Gawain Lynch <gawain.lynch@gmail.com>
 */
class AssociateType extends MembersAssociateType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }
}

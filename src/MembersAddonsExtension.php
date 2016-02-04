<?php

namespace Bolt\Extension\Europeana\MembersAddon;

use Bolt\Extension\SimpleExtension;
use Silex\Application;

/**
 * Members add-ons for Europeana.
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class MembersAddonsExtension extends SimpleExtension
{
    /**
     * {@inheritdoc}
     */
    public function getServiceProviders()
    {
        return [$this];
    }
}

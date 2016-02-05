<?php

namespace Bolt\Extension\Europeana\MembersAddons;

use Bolt\Extension\Europeana\MembersAddons\Provider\MembersAddonsServiceProvider;
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
        return [
            $this,
            new MembersAddonsServiceProvider(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigPaths()
    {
        return [
            'templates/profile' => ['position' => 'prepend']
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultConfig()
    {
        return [
            'meta_fields' => [
                'profile' => [
                    'website',
                    'twitter_handle',
                    'biography',
                    'address_street',
                    'address_street_meta',
                    'address_city',
                    'address_state',
                    'address_country',
                    'phone_number',
                ],
            ],
        ];
    }
}

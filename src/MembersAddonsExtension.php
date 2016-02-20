<?php

namespace Bolt\Extension\Europeana\MembersAddons;

use Bolt\Extension\Bolt\Members\Event\MembersEvents;
use Bolt\Extension\Bolt\Members\Event\MembersProfileEvent;
use Bolt\Extension\Europeana\MembersAddons\Provider\MembersAddonsServiceProvider;
use Bolt\Extension\SimpleExtension;
use Silex\Application;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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
            new MembersAddonsServiceProvider($this->getConfig()),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigPaths()
    {
        return [
            'templates/admin' => ['position' => 'prepend', 'namespace' => 'MembersAdmin'],
            'templates/profile' => ['position' => 'prepend'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function subscribe(EventDispatcherInterface $dispatcher)
    {
        $dispatcher->addListener(MembersEvents::MEMBER_PROFILE_SAVE, [$this, 'onProfileSave']);
    }

    /**
     * Tell Members what fields we want to persist.
     *
     * @param MembersProfileEvent $event
     */
    public function onProfileSave(MembersProfileEvent $event)
    {
        $config = $this->getConfig();
        $event->setMetaFields($config['meta_fields']['profile']);
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

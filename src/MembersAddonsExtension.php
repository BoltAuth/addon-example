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
            'templates/admin'   => ['position' => 'prepend', 'namespace' => 'MembersAdmin'],
            'templates/profile' => ['position' => 'prepend'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function subscribe(EventDispatcherInterface $dispatcher)
    {
        $dispatcher->addListener(MembersEvents::MEMBER_PROFILE_PRE_SAVE, [$this, 'onProfileSave']);
    }

    /**
     * {@inheritdoc}
     */
    protected function registerServices(Application $app)
    {
        $config = $this->getConfig();
        $app['members.addons.config'] = $app->share(
            function () use ($config) {
                return new Config($config);
            }
        );

        $app['members.meta_fields'] = $app->share(
            function ($app) use ($config) {
                return $app['members.meta_fields'] + $config['meta_fields'];
            }
        );
    }

    /**
     * Tell Members what fields we want to persist.
     *
     * @param MembersProfileEvent $event
     */
    public function onProfileSave(MembersProfileEvent $event)
    {
        $config = $this->getConfig();
        $event->addMetaFieldNames(array_keys($config['meta_fields']['profile']));
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultConfig()
    {
        return [
            'meta_fields' => [
                'profile' => [
                    'website' => [
                        'required' => false,
                    ],
                    'twitter_handle' => [
                        'required' => false,
                    ],
                    'biography' => [
                        'required' => false,
                    ],
                    'address_street' => [
                        'required' => false,
                    ],
                    'address_street_meta' => [
                        'required' => false,
                    ],
                    'address_city' => [
                        'required' => false,
                    ],
                    'address_state' => [
                        'required' => false,
                    ],
                    'address_country' => [
                        'required' => false,
                    ],
                    'phone_number' => [
                        'required' => false,
                    ],
                ],
            ],
        ];
    }
}

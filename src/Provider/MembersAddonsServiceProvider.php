<?php

namespace Bolt\Extension\Europeana\MembersAddons\Provider;

use Bolt\Extension\Europeana\MembersAddons\Form;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Members add-on service provider.
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class MembersAddonsServiceProvider implements ServiceProviderInterface
{
    /** @var array */
    private $config;

    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function register(Application $app)
    {
        $app['members.meta_fields'] = $app->share(
            function ($app) {
                return $app['members.meta_fields'] + $this->config['meta_fields'];
            }
        );
    }

    /**
     * Override the Members form objects at the start of the request cycle.
     *
     * @param Application $app
     */
    public function onRequest(Application $app)
    {
        $app['members.form.components'] = $app->extend(
            'members.form.components',
            function ($components, $app) {
                $components['type']['profile'] = $app->share(
                    function () use ($app) {
                        return new Form\Type\ProfileEditType($app['members.config']);
                    }
                );
                $components['entity']['profile'] = $app->share(
                    function () use ($app) {
                        return new Form\Entity\ProfileEdit($app['members.records']);
                    }
                );

                return $components;
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function boot(Application $app)
    {
        $this->onRequest($app);
    }
}

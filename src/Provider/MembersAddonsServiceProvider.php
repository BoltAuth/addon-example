<?php

namespace Bolt\Extension\Europeana\MembersAddons\Provider;

use Bolt\Extension\Bolt\Members\Form\Validator\Constraint\UniqueEmail;
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
            function () {
                return $this->config['meta_fields'];
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
        $app['members.form.components'] = $app->share(
            function ($app) {
                $type = new \Pimple(
                    [
                        // @codingStandardsIgnoreStart
                        'login'    => $app->share(function () use ($app) { return new Form\Type\LoginType($app['members.config']); }),
                        'logout'   => $app->share(function () use ($app) { return new Form\Type\LogoutType($app['members.config']); }),
                        'profile'  => $app->share(function () use ($app) { return new Form\Type\ProfileType($app['members.config']); }),
                        'register' => $app->share(function () use ($app) { return new Form\Type\RegisterType($app['members.config'], $app['members.records']); }),
                        // @codingStandardsIgnoreEnd
                    ]
                );
                $entity = new \Pimple(
                    [
                        // @codingStandardsIgnoreStart
                        'login'    => $app->share(function () use ($app) { return new Form\Entity\Login(); }),
                        'logout'   => $app->share(function () use ($app) { return new Form\Entity\Logout(); }),
                        'profile'  => $app->share(function () use ($app) { return new Form\Entity\Profile($app['members.records']); }),
                        'register' => $app->share(function () use ($app) { return new Form\Entity\Register(); }),
                        // @codingStandardsIgnoreEnd
                    ]
                );
                $constraint = new \Pimple(
                    [
                        // @codingStandardsIgnoreStart
                        'email' => $app->share(function () use ($app) { return new UniqueEmail($app['members.records']); }),
                        // @codingStandardsIgnoreEnd
                    ]
                );

                return new \Pimple([
                    'type'       => $type,
                    'entity'     => $entity,
                    'constraint' => $constraint,
                ]);
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

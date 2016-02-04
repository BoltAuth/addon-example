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
    /**
     * @inheritDoc
     */
    public function register(Application $app)
    {
    }

    /**
     * Override the Members form objects at the start of the request cycle.
     *
     * @param Application $app
     */
    public function onRequest(Application $app)
    {
        $app['members.forms'] = $app->share(
            function ($app) {
                $type = new \Pimple(
                    [
                        // @codingStandardsIgnoreStart
                        'login'    => $app->share(function () use ($app) { return new Form\Type\LoginType(); }),
                        'profile'  => $app->share(function () use ($app) { return new Form\Type\ProfileType(); }),
                        'register' => $app->share(function () use ($app) { return new Form\Type\RegisterType($app['members.records']); }),
                        // @codingStandardsIgnoreEnd
                    ]
                );
                $entity = new \Pimple(
                    [
                        // @codingStandardsIgnoreStart
                        'login'    => $app->share(function () use ($app) { return new Form\Entity\Login(); }),
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

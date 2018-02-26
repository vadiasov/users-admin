<?php

namespace Vadiasov\UsersAdmin\Test2;

use Vadiasov\UsersAdmin\UsersAdminFacade;
use Vadiasov\UsersAdmin\UserServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * Load package service provider
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [UserServiceProvider::class];
    }
    
    /**
     * Load package alias
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'UsersAdmin' => UsersAdminFacade::class,
        ];
    }
}
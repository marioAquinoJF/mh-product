<?php

namespace Satelite\Tests\Products;

use Orchestra\Testbench\TestCase;

class AbstractTestsCase extends TestCase
{

    public function migrate()
    {
        $this->artisan('migrate', [
            '--realpath' => realpath(__DIR__ . '/../../database/migrations/Products')
        ]);
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }


}

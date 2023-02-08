<?php

namespace FmTod\IdeHelperActions\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use FmTod\IdeHelperActions\LaravelActionsIdeHelperServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelActionsIdeHelperServiceProvider::class,
        ];
    }

}

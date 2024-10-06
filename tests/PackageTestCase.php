<?php

namespace Ntoufoudis\LaravelOcr\Tests;

use Ntoufoudis\LaravelOcr\LaravelOcrServiceProvider;
use Orchestra\Testbench\TestCase;

class PackageTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelOcrServiceProvider::class,
        ];
    }
}

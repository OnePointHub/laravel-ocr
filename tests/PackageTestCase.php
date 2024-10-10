<?php

namespace OnePointHub\LaravelOcr\Tests;

use OnePointHub\LaravelOcr\LaravelOcrServiceProvider;
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

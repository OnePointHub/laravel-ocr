<?php

namespace Ntoufoudis\LaravelOcr\Facades;

use Illuminate\Support\Facades\Facade;

class Ocr extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Ocr';
    }
}

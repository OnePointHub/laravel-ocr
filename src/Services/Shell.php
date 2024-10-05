<?php

namespace Ntoufoudis\LaravelOcr\Services;

class Shell
{
    public function execute($command): string
    {
        return trim(`{$command}`);
    }
}

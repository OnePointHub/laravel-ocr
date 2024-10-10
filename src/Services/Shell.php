<?php

namespace OnePointHub\LaravelOcr\Services;

class Shell
{
    public function execute($command): string
    {
        return trim(`{$command}`);
    }
}

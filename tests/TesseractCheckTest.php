<?php

it('can check if  Tesseract is installed', function () {
    $this->artisan('tesseract:check')
        ->expectsOutputToContain('Found Tesseract')
        ->assertExitCode(0);
});

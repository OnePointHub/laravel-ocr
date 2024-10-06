<?php

it('can parse image', function () {
    $this->artisan('image:parse', ['imagePaths' => [__DIR__ . '/../resources/sampleImages/1.jpg']])
        ->expectsOutputToContain('Example')
        ->assertExitCode(0);
});

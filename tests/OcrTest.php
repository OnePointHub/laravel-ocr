<?php

use Ntoufoudis\LaravelOcr\Facades\Ocr;

it('can get the image', function () {
    $imagePath = __DIR__ . '/../resources/sampleImages/1.jpg';
    $text = Ocr::scan($imagePath);
    $this->assertTrue(str_contains($text, "Example"));
});

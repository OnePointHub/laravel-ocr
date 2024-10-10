<?php

use OnePointHub\LaravelOcr\Facades\Ocr;

it('can get the text from an image', function () {
    $imagePath = __DIR__ . '/../resources/sampleImages/1.jpg';
    $text = Ocr::scan($imagePath);
    $this->assertTrue(str_contains($text, "Example"));
});

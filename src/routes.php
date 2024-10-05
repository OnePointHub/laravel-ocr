<?php

Route::get('ocr', 'Ntoufoudis\LaravelOcr\Controllers\OcrController@home')->name('home');

Route::post('ocr', 'Ntoufoudis\LaravelOcr\Controllers\OcrController@readImage');

Route::get('ocr/test', 'Ntoufoudis\LaravelOcr\Controllers\OcrController@test');

<?php

namespace Ntoufoudis\LaravelOcr\Controllers;

use Ntoufoudis\LaravelOcr\Services\OcrAbstract;
use App\Http\Controllers\Controller;
use Ntoufoudis\LaravelOcr\Facades\Ocr;

class OcrController extends Controller
{
    public function home()
    {
        return view('laravel-ocr/upload');
    }

    public function readImage()
    {
        $image = request('image');
        if(isset($image) && $image->getPathName()) {
            $ocr = app()->make(OcrAbstract::class);
            $parsedText = $ocr->scan($image->getPathName());
            return view('laravel-ocr/parsed-text', compact('parsedText'));
        }
    }

    public function test()
    {
        $imagePath = resource_path('laravel-ocr/sampleImages/1.jpg');
        return Ocr::scan($imagePath);
    }
}

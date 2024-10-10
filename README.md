# Laravel-Ocr
[![Latest Stable Version](https://poser.pugx.org/onepointhub/laravel_ocr/v)](https://packagist.org/packages/onepointhub/laravel_ocr)
[![License](https://poser.pugx.org/onepointhub/laravel_ocr/license)](https://packagist.org/packages/onepointhub/laravel_ocr)

## Table of Contents
* [Laravel-Ocr](#laravel-ocr)
  * [About](#about)
  * [Features](#features)
  * [Requirements](#requirements)
  * [Installation](#installation)
  * [Usage](#usage)
    * [Tesseract](#tesseract)
      * [Check if Tesseract is installed](#check-if-tesseract-is-installed-in-your-system)
      * [Parse Images via Artisan Command](#parse-images-via-artisan-command)
      * [Use in Project](#use-in-your-project)
        * [Examples](#examples)

## About
Laravel Optical Character Reader (OCR) package using ocr engines like [Tesseract](https://github.com/tesseract-ocr/tesseract) under the hood.

Inspired by [LaraOCR](https://github.com/alimranahmed/LaraOCR/tree/master)

## Features
1. Read text from image using a Web Page or CLI.
2. Can be used as a Laravel Facade
3. Configurable and Extendable

## Requirements
OCR Engine Tesseract must be installed in the system.

Follow Tesseract installation guide [here](https://github.com/tesseract-ocr/tessdoc#compiling-and-installation).

Make sure from the command line you have the `tesseract` command available.

## Installation

Install the package

```shell
composer require onepointhub/laravel_ocr
```

Then publish this package

```shell
php artisan vendor:publish --provider=Ntoufoudis\\LaravelOcr\\LaravelOcrServiceProvider
```

## Usage

Currently, the package only supports [Tesseract](https://github.com/tesseract-ocr/tesseract) so there is no need to alter anything in the config file.

### Tesseract

#### Check if Tesseract is installed in your system
```shell
php artisan tesseract:check
```

#### Parse images via artisan command
```shell
php artisan image:parse {imagePaths}
```

The command accepts multiple absolute paths for images and outputs the parsed text.

Example:

```shell
php artisan image:parse /path/to/the/image/file.jpg

Output:
=================== Parsed Result ========================
__________________________________________________________

Example : Process

Chocolate cake with vanilla/almond frosting provides a
tasty treat for any occasion. Follow the directions for making
any flavor of chocolate cake. While the cake bakes in the oven,
prepare a box of vanilla frosting mix added with roasted and
buttered almond slivers. Evenly coated in melted butter the
almond slivers toast in a hot skillt for approximately ten
minutes. Thoroughly toast the slivers without turning them
crispy. Cool the toasted almonds and set aside a handful for
the final touch. Fold the almonds into the vanilla frosting, and
after covering the cake, sprinkle a handful of toasted almonds
on the top. After serving this desert to your guests theny
generally ask for the receipe of your chocolate/vanilla/almond
cake. Now you have the opportunity to smile and...

__________________________________________________________

```

#### Use in your project
You can access the ```Ocr Facade``` to scan an image:
```php
use Ntoufoudis\LaravelOcr\Facades\Ocr;

Ocr::scan($imagePath);
```

##### Examples
###### Controller:
```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Ntoufoudis\LaravelOcr\Facades\Ocr;

class OcrController extends Controller
{
    public function index()
    {
        return view('upload_image');
    }
    
    public function readImage()
    {
        $image = request('image');
        
        if (isset($image) && $image->getPathName()) {
            $parsedText = Ocr::scan($image->getPathName());
            
            return view('parsed_image', compact('parsedText'));
        }
    }
}
```

###### Views:
```html
//resources/views/upload_image.blade.php

<div>
    <h2>Upload Image</h2>
    
    <form action="{{ route('read-image') }}" enctype="multipart/form-data" method="POST">
        @csrf
    
        <input type="file" name="image" placeholder="Select Image">
        <button type="submit">Parse Text</button>
    </form>
</div>
```

```html
//resources/views/parsed_image.blade.php

<div>
    <h2>Output</h2>
    
    @if(!empty($parsedText))
      <p>{{ $parsedText }}</p>
    @else
      <p>No Text Found</p>
    @endif
    
    <a href="{{ route('home') }}">Parse another image</a>
</div>
```

###### Routes:
```php
//routes/web.php

Route::get('/upload_image', [App\Http\Controllers\OcrController::class, 'index'])->name('home');
Route::post('/upload_image', [App\Http\Controllers\OcrController::class, 'readImage'])->name('read-image');
```

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security
If you discover any security related issues, please email info@ntoufoudis.com instead of using the issue tracker.

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

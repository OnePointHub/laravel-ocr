[![Latest Stable Version](http://poser.pugx.org/ntoufoudis/laravel_ocr/v)](https://packagist.org/packages/ntoufoudis/laravel_ocr)
[![License](http://poser.pugx.org/ntoufoudis/laravel_ocr/license)](https://packagist.org/packages/ntoufoudis/laravel_ocr)
[![Total Downloads](http://poser.pugx.org/ntoufoudis/laravel_ocr/downloads)](https://packagist.org/packages/ntoufoudis/laravel_ocr)

## Laravel-Ocr
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

```
composer require ntoufoudis/laravel_ocr
```

Then publish this package

```
php artisan vendor:publish --provider=Ntoufoudis\\LaravelOcr\\LaravelOcrServiceProvider
```

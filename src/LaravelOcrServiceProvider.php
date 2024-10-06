<?php

namespace Ntoufoudis\LaravelOcr;

use Ntoufoudis\LaravelOcr\Commands\ImageParsing;
use Ntoufoudis\LaravelOcr\Services\OcrAbstract;
use Illuminate\Support\ServiceProvider;

class LaravelOcrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ImageParsing::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/../views/laravel-ocr', 'laravel-ocr');

        $this->publishes([
            __DIR__.'/../config/ocr.php' => config_path('ocr.php'),
            __DIR__.'/../resources/' => resource_path('laravel-ocr'),
            __DIR__.'/../views/laravel-ocr' => resource_path('views/laravel-ocr'),
        ]);


        $this->app->singleton(OcrAbstract::class, function () {
            return $this->resolvedEngineClass();
        });

        $this->app->singleton('Ocr', function () {
            return $this->resolvedEngineClass();
        });
    }

    private function resolvedEngineClass()
    {
        $namespace = 'Ntoufoudis\LaravelOcr\Services';
        $ocrEngine = config('ocr.ocr_engine');
        $engineClass = config("ocr.ocr.engines.{$ocrEngine}.class", 'Tesseract');
        $fullClassPath = "$namespace\\$engineClass";
        return new $fullClassPath();
    }
}

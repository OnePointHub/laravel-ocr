<?php

namespace Ntoufoudis\LaravelOcr;

use Ntoufoudis\LaravelOcr\Console\ImageParsing;
use Ntoufoudis\LaravelOcr\Console\Tesseract;
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
                Tesseract::class,
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
        $this->publishes([
            __DIR__.'/../config/ocr.php' => config_path('ocr.php'),
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

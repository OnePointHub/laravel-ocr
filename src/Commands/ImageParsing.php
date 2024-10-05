<?php

namespace Ntoufoudis\LaravelOcr\Commands;

use Illuminate\Contracts\Container\BindingResolutionException;
use Ntoufoudis\LaravelOcr\Services\OcrAbstract;
use Illuminate\Console\Command;

class ImageParsing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:parse {imagePath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse image using absolute path';

    protected string $imagePath;

    /**
     * ImageParsing constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws BindingResolutionException
     */
    public function handle()
    {
        $this->imagePath = $this->argument('imagePath');
        $ocr = app()->make(OcrAbstract::class);
        $parsedText = $ocr->scan($this->imagePath);
        $this->info('=================== Parsed Result ========================');
        $this->info('__________________________________________________________');
        $this->info($parsedText);
        $this->info('__________________________________________________________');
    }
}

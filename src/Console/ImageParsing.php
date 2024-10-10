<?php

namespace OnePointHub\LaravelOcr\Console;

use OnePointHub\LaravelOcr\Facades\Ocr;
use Illuminate\Console\Command;

class ImageParsing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:parse {imagePaths* : List of Image paths}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse images using absolute path';

    protected array $imagePaths = [];

    /**
     * Execute the console command.
     *
     */
    public function handle(): void
    {
        $parsedText = [];
        foreach ($this->argument('imagePaths') as $imagePath) {
            $this->imagePaths[] = $imagePath;
        }

        foreach ($this->imagePaths as $imagePath) {
            $parsedText[] = Ocr::scan($imagePath);
        }
        $this->info('=================== Parsed Result ========================');
        foreach ($parsedText as $text) {
            $this->info('__________________________________________________________');
            $this->newLine();
            $this->info($text);
            $this->newLine();
            $this->info('__________________________________________________________');
        }
    }
}

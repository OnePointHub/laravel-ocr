<?php

namespace OnePointHub\LaravelOcr\Console;

use Illuminate\Console\Command;
use OnePointHub\LaravelOcr\Services\Shell;

class Tesseract extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tesseract:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if tesseract is installed.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $shell = new Shell();

        $command = 'tesseract --version 2>&1 | head -n 1';

        $output = $shell->execute($command);

        $explode = explode(' ', $output);
        $version = $explode[1];

        $this->info('Checking if tesseract is installed...');
        $this->newLine();

        if (str_contains($output, 'command not found')) {
            $this->error('Tesseract is not installed.');
            $this->newLine();
            $this->info('Make sure to install it before using this package.');
        } else {
            $this->info('Found Tesseract version ' . $version);
        }
        $this->newLine();
    }
}

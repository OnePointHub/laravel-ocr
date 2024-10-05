<?php

namespace Ntoufoudis\LaravelOcr\Services;

class Tesseract extends OcrAbstract
{
    protected $command;

    public function scan($imagePath, $lang = null)
    {
        if ($lang === null) {
            $lang = env('OCR_LANG', 'en');
        }

        $this->setImagePath($imagePath);
        $shell = new Shell();

        $executable = config('tesseract.executable', 'tesseract');
        $langParam = ($lang !== null) ? ' -l ' . $lang : '';

        $command = trim($executable . $langParam . ' ' . $imagePath) . 'stdout quit';

        return $shell->execute($command);
    }

    // TODO: Implement function listLang(): array
    // TODO: Implement function langSupported(string $lang): bool
}

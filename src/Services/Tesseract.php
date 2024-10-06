<?php

namespace Ntoufoudis\LaravelOcr\Services;

class Tesseract extends OcrAbstract
{
    protected string $command;

    public function scan($imagePath, $lang = null): string
    {
        if ($lang === null) {
            $lang = env('OCR_LANG', 'eng');
        }

        $this->setImagePath($imagePath);
        $shell = new Shell();

        $ocrEngine = config('ocr.ocr_engine', 'tesseract');

        $executable = config("ocr.engines.$ocrEngine.executable", 'tesseract');
        $langParam = ($lang !== null) ? ' -l ' . $lang : '';
        $command = trim($executable . $langParam . ' ' . $imagePath) . ' stdout quiet';

        return $shell->execute($command);
    }

    // TODO: Implement function listLang(): array
    // TODO: Implement function langSupported(string $lang): bool
}

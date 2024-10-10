<?php

namespace OnePointHub\LaravelOcr\Services;

use Symfony\Component\HttpFoundation\File\File;

abstract class OcrAbstract
{
    protected string $imagePath;

    protected File $image;

    protected string $outputText;

    abstract public function scan($imagePath);

    public function setImagePath($imagePath): File
    {
        $this->image = new File($imagePath);
        $this->imagePath = $imagePath;
        return $this->image;
    }

    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    public function getImage(): File
    {
        return $this->image;
    }

    public function getOutput(): string
    {
        return $this->outputText;
    }
}

<?php

namespace Blixon\Toml;

use Blixon\DotArray\DotArray;

class Toml
{
    private DotArray $array;

    protected function __construct(){}

    public static function fromFile(string $file): self
    {
        $toml = new self();
        $toml->assembleArray($file);
        return $toml;
    }

    private function assembleArray(string $file): void
    {
        $ARRAY = new DotArray([]);
        $reader = new FileReader($file);
        while (!$reader->hasFinished()) {
            $line = new LineAnalyzer($reader);
        }
        $this->array = $ARRAY;
    }
}
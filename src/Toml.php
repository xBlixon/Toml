<?php

namespace Blixon\Toml;

use Blixon\DotArray\DotArray;

class Toml
{
    private DotArray $array;
    private FileReader $reader;

    protected function __construct(){}

    public static function fromFile(string $file): self
    {
        $toml = new self();
        $toml->reader = FileReader::fromFile($file);
        $toml->assembleArray();
        return $toml;
    }

    private function assembleArray(): void
    {
        $ARRAY = new DotArray([]);
        while (!$this->reader->hasFinished()) {
            $line = new LineAnalyzer($this->reader);
        }
        $this->array = $ARRAY;
    }
}
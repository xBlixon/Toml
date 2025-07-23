<?php

namespace Blixon\Toml;

class Toml
{
    private FileReader $reader;

    protected function __construct(){}

    public static function fromFile(string $filename): self
    {
        $toml = new self();
        $toml->reader = new FileReader($filename);
        $toml->assembleArray();
        return $toml;
    }

    private function assembleArray(): array
    {
        $ARRAY = [];
        while ($line = $this->reader->getLine()) {
            // array assembly logic
        }
        return $ARRAY;
    }
}
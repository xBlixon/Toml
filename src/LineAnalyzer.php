<?php

namespace Blixon\Toml;

readonly class LineAnalyzer
{
    private FileReader $reader;
    public string $key;
    public mixed $value;

    public function __construct(FileReader &$reader)
    {
        $this->reader = $reader;
    }
}
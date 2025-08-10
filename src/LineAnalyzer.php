<?php

namespace Blixon\Toml;

class LineAnalyzer
{
    readonly public string $key;
    readonly public mixed $value;

    private FileReader $reader;
    private string $currentLine;

    public function __construct(FileReader &$reader)
    {
        $this->reader = $reader;
        $this->currentLine = $this->reader->getLine();
        $this->keyValue();
    }

    public function getKeyValue(): array
    {
        return [$this->key, $this->value];
    }

    private function keyValue(): void
    {
        [$this->key, $this->value] = mb_split("\s*?=\s*", $this->currentLine);
    }

    private function loadNextLine(): void
    {
        if($this->reader->hasFinished()) {
            throw new LineAnalyzerException(
                "Unexpected End-Of-File."
            );
        }
        $this->currentLine = $this->reader->getLine();
    }
}
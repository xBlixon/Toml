<?php

namespace Blixon\Toml;

class FileReader
{
    private array $lines = [];

    protected function __construct(){}

    /**
     * @throws FileReaderException
     */
    public static function fromFile(string $file): self
    {
        if (!file_exists($file)) {
            $path = realpath($file);
            throw new FileReaderException("File: $path does not exist.");
        }
        $reader = new self();
        $reader->lines = file($file, FILE_IGNORE_NEW_LINES);
        return $reader;
    }

    public static function fromText(string $text): self
    {
        $reader = new self();
        $reader->lines = mb_split("\r\n|\n|\r", $text); // Split by newline
        return $reader;
    }

    public function getAllLines(): array
    {
        return $this->lines;
    }

    public function getLine(): string|false
    {
        $line = current($this->lines);
        next($this->lines);
        return $line;
    }

    public function hasFinished(): bool
    {
        // current(...) will only give string or false
        $line = current($this->lines);
        if (gettype($line) == "string") {
            return false;
        }
        return true;
    }
}
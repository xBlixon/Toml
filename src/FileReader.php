<?php

namespace Blixon\Toml;

class FileReader
{
    private array $lines = [];

    /**
     * @throws FileReaderException
     */
    public function __construct(string $file)
    {
        if (!file_exists($file)) {
            $path = realpath($file);
            throw new FileReaderException("File: $path does not exist.");
        }
        $this->lines = file($file, FILE_IGNORE_NEW_LINES);
    }

    public function getLine(): string|false
    {
        $line = current($this->lines);
        next($this->lines);
        return $line;
    }

    public function hasFinished(): bool
    {
        // Current will only give string or false
        $line = current($this->lines);
        if (gettype($line) == "string") {
            return false;
        }
        return true;
    }
}
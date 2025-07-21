<?php

namespace Blixon\Toml;

class FileReader
{
    private array $lines = [];

    /**
     * @throws FileReaderException
     */
    public function __construct(string $filename)
    {
        if (!file_exists($filename)) {
            $path = realpath($filename);
            throw new FileReaderException("File: $path does not exist.");
        }
        $this->lines = file($filename, FILE_IGNORE_NEW_LINES);
    }

    public function getLine(): string|false
    {
        return next($this->lines);
    }
}
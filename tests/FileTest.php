<?php

use Blixon\Toml\FileReaderException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Blixon\Toml\FileReader;

#[CoversClass(FileReader::class)]
class FileTest extends TestCase
{
    public function testFile(): void
    {
        new FileReader("./tests/test-config.toml");
        $this->expectNotToPerformAssertions();
    }

    public function testFileNotFound(): void
    {
        $this->expectException(FileReaderException::class);
        new FileReader("./tests/test-config-not-existent.toml");
    }
}
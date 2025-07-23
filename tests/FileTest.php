<?php

use Blixon\Toml\FileReaderException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Blixon\Toml\FileReader;

#[CoversClass(FileReader::class)]
class FileTest extends TestCase
{
    private string $testConfigPath = "./tests/test-config.toml";

    public function testOpenValidFile(): void
    {
        new FileReader($this->testConfigPath);
        $this->expectNotToPerformAssertions();
    }

    public function testFileNotFound(): void
    {
        $this->expectException(FileReaderException::class);
        new FileReader("./tests/test-config-not-existent.toml");
    }

    public function testGetLine(): void
    {
        $reader = new FileReader($this->testConfigPath);
        $reader->getLine();
        $second = $reader->getLine();
        $this->assertEquals("year = 1984 #Comment", $second);
    }
}
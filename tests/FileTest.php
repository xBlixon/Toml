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
        FileReader::fromFile($this->testConfigPath);
        $this->expectNotToPerformAssertions();
    }

    public function testFileNotFound(): void
    {
        $this->expectException(FileReaderException::class);
        FileReader::fromFile("./tests/test-config-not-existent.toml");
    }

    public function testGetLine(): void
    {
        $reader = FileReader::fromFile($this->testConfigPath);
        $reader->getLine();
        $second = $reader->getLine();
        $this->assertEquals("year = 1984 #Comment", $second);
    }

    public function testFromText(): void
    {
        $reader = FileReader::fromText(
            <<<TOML
hello = world
key = value

TOML
        );
        $this->assertEquals(
            [
                "hello = world",
                "key = value",
                ""
            ],
            $reader->getAllLines()
        );
    }
}
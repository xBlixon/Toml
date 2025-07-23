<?php

use Blixon\Toml\Toml;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Toml::class)]
final class TomlTest extends TestCase
{
    public function testTomlFromFile(): void
    {
        $toml = Toml::fromFile("./tests/test-config.toml");
        $this->expectNotToPerformAssertions(); // WIP
    }
}
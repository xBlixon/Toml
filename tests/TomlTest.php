<?php

use Blixon\Toml\Toml;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Toml::class)]
final class TomlTest extends TestCase
{
    public function testTomlFromFile(): void
    {
        $arr = Toml::fromFile("./tests/test-config.toml");
        $this->assertSame([], $arr);
    }
}
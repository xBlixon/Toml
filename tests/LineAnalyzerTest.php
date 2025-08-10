<?php

use Blixon\Toml\FileReader;
use Blixon\Toml\LineAnalyzer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(LineAnalyzer::class)]
class LineAnalyzerTest extends TestCase
{
    public function testKeyValue(): void
    {
        $reader = FileReader::fromText
        (<<<TOML
        key = value
        hundred = 100
        TOML
        );
        $line1 = new LineAnalyzer($reader);
        $line2 = new LineAnalyzer($reader);
        $this->assertEquals(["key", "value"], $line1->getKeyValue());
        $this->assertEquals(["hundred", "100"], $line2->getKeyValue());
    }
}
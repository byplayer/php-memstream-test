<?php

use PHPUnit\Framework\TestCase;

class MemStreamTest extends TestCase
{
    public function testAPlus()
    {
        $fh = fopen("php://memory", "a+");
        $this->assertEquals(5,fwrite($fh, "hello"));
        fseek($fh, 0);
        $this->assertEquals("hello", fread($fh,2048));
        $this->assertTrue(fclose($fh));
    }

    public function testMemoryReadOnly()
    {
        $fh = fopen("php://memory", "r");
        $this->assertEquals(0, fwrite($fh, "hello"));
        $this->assertTrue(fclose($fh));
    }

    public function testTempReadOnly()
    {
        $fh = fopen("php://temp", "r");
        $this->assertEquals(0, fwrite($fh, "hello"));
        $this->assertTrue(fclose($fh));
    }
}
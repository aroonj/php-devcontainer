<?php

declare(strict_types=1);

namespace Example\Demo;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;


final class GreeterTest extends TestCase
{
    private $greeter;

    // This method is called before the first test of this test class is run.
    public static function setUpBeforeClass(): void
    {
        // Initialization code here
    }

    // This method is called before each test method is executed.
    protected function setUp(): void
    {
        // Initialization code here
        echo "Starting test\n";
        $this->greeter = new Greeter;
    }



    public function testGreetsWithName(): void
    {
        echo "GreetsWithName test\n";
        $greeting = $this->greeter->greet('Alice');

        $this->assertSame('Hello, Alice!', $greeting);
    }


    public function testValidateParamnetersException(): void
    {
        echo "ValidateParamnetersException test\n";
        $this->expectException(InvalidArgumentException::class);

        $ok = $this->greeter->validateParamneters("Should be exception");
    }


    public function testValidateParamneters(): void
    {
        echo "Validate parameter test\n";
        $ok = $this->greeter->validateParamneters("TEST");
        $this->assertSame("OK",$ok,"Should be OK");
    }

    // This method is called after each test method is executed.
    protected function tearDown(): void
    {
        // Clean up code here
        echo "Completed\n\n";
    }

    // This method is called after the last test of this test class is run.
    public static function tearDownAfterClass(): void
    {
        // Clean up code here
    }
}

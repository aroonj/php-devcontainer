<?php declare(strict_types=1);
namespace Example\Demo;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;


final class GreeterTest extends TestCase
{
    public function testGreetsWithName(): void
    {
        $greeter = new Greeter;

        $greeting = $greeter->greet('Alice');

        $this->assertSame('Hello, Alice!', $greeting);
    }


    public function testException(): void
    {
        $greeter = new Greeter;
        $this->expectException(InvalidArgumentException::class);
        
        $ok=$greeter->validateParamneters("Should be exception");
    }
}
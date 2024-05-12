<?php declare(strict_types=1);
namespace Example\Demo;

use PharIo\Manifest\InvalidUrlException;

final class Greeter
{
    public function greet(string $name): string
    {
        return 'Hello, ' . $name . '!';
    }

    public function validateParamneters(String $name){
        if ($name !="TEST") {
            throw new \InvalidArgumentException("Expected 'TEST', received " . $name);
        }

        return "OK";
    }
}
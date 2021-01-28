<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    /**
     * @dataProvider helloDataProvider
     */
    public function testSayHelloArgument($expected, $input)
    {
        $this->assertEquals('Hello ' . $expected, sayHelloArgument($input));
    }

    public function helloDataProvider()
    {
        return [
            ['Ihor', 'Ihor'],
            [1, 1],
            [3, 3],
            [false, false],
            [true, true]
        ];
    }
}
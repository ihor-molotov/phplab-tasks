<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    /**
    * @dataProvider exceptionDataProvider
    */
    public function testCountArgumentsWrapper($input)
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper($input);
    }
    
    public function exceptionDataProvider()
    {
        return [
            [123],
            [true],
            [false],
            [[9, 4, 1]]
        ];
    }
}
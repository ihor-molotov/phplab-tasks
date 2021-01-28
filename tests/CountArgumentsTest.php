<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
     * @dataProvider argumentDataProvider
     */
    public function testCountArguments($input, $expected)
    {
        $this->assertEquals($expected, countArguments(...$input));
    }

    public function argumentDataProvider()
    {
        return [
            [[], ['argument_count' => 0, 'argument_values' => []]],
            [['hi'], ['argument_count' => 1, 'argument_values' => ['hi']]],
            [['hello', 'world'], ['argument_count' => 2, 'argument_values' => ['hello', 'world']]]
        ];
    }
}
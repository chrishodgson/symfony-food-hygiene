<?php
namespace AppBundle\Test\Utils;

use AppBundle\Utils\IntegerTrait;

class IntegerTraitTest extends \PHPUnit_Framework_TestCase
{
    /** @var IntegerTrait */
    private $sut;

    protected function setUp()
    {
        $this->sut = $this->getMockForTrait(IntegerTrait::class);
    }

    public function testIsInteger()
    {
        $integer = 1234;

        $actual = $this->sut->isInteger($integer);

        $this->assertTrue($actual);
    }

    public function invalidIntegerProvider()
    {
        return [
            'string' => [['string']],
            'string starting with integer' => [['1string']],
            'string ending with integer' => [['string1']],
            'false' => [[false]],
            'true' => [[true]],
            'float' => [[0.1]],
            'float as string' => [['0.1']],
        ];
    }

    /**
     * @param $invalid
     * @dataProvider invalidIntegerProvider
     */
    public function testIsNotInteger($invalid)
    {
        $actual = $this->sut->isInteger($invalid);

        $this->assertFalse($actual);
    }
}

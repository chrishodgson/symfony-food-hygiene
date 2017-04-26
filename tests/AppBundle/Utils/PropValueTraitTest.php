<?php
namespace AppBundle\Test\Utils;

use AppBundle\Utils\PropValueTrait;

class PropValueTraitTest extends \PHPUnit_Framework_TestCase
{
    /** @var PropValueTrait */
    private $sut;

    protected function setUp()
    {
        $this->sut = $this->getMockForTrait(PropValueTrait::class);
    }

    public function testPropertyFound()
    {
        $expected = 'fieldValue';

        $data = (object) [
            'fieldName' => 'fieldValue'
        ];

        $actual = $this->sut->getPropValue($data, 'fieldName');

        $this->assertSame($expected, $actual);
    }

    public function testPropertyNotFound()
    {
        $data = (object) [];

        $actual = $this->sut->getPropValue($data, 'invalidFieldName');

        $this->assertNull($actual);
    }
}

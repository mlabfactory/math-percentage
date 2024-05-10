<?php
namespace Mlab\MathPercentage\Test;

use Mlab\MathPercentage\Service\MathCalculator;
use PHPUnit\Framework\TestCase;

class MathCalculatorTest extends TestCase {

    public function testCalculatePercentageAverage()
    {
        $calculator = MathCalculator::calculate(MathCalculator::AVERAGE, 100, 50, 50, 50, 50, 12);
        $this->assertEquals(52, $calculator->getResult());
    }

    public function testCalculatePercentageInvalidType()
    {
        $this->expectException(\Mlab\MathPercentage\Exception\MathException::class);
        MathCalculator::calculate('invalid', 100, 10);
    }

    public function testToStringWithDecimals()
    {
        $calculator = MathCalculator::calculate(MathCalculator::AVERAGE, 100, 50, 50, 50, 50, 12);
        $this->assertEquals('52.000', $calculator->toString(3));
    }


}
<?php
use PHPUnit\Framework\TestCase;
use Mlab\MathPercentage\Service\PercentCalculator;

class PercentCalculatorTest extends TestCase
{
    public function testCalculatePercentageIncrease()
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::INCREASE, 100, 150);
        $this->assertEquals(50, $calucaltor->getResult());
    }

    public function testCalculatePercentageDecrease()
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::DECREASE, 100, 50);
        $this->assertEquals(50, $calucaltor->getResult());
    }

    public function testCalculatePercentageTotalPercentage()
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::TOTAL_PERCENTAGE, 500, 1000);
        $this->assertEquals(50, $calucaltor->getResult());
    }

    public function testCalculatePercentageMarginPercentage()
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::MARGIN_PERCENTAGE, 100, 200);
        $this->assertEquals(100, $calucaltor->getResult());
    }

    public function testCalculatePercentageInterestPercentage()
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::INTEREST_PERCENTAGE, 100, 10);
        $this->assertEquals(10, $calucaltor->getResult());
    }

    public function testCalculatePercentageInvalidType()
    {
        $this->expectException(\Mlab\MathPercentage\Exception\MathException::class);
        PercentCalculator::calculatePercentage('invalid', 100, 10);
    }

    public function testToStringWithDecimals()
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::INCREASE, 100, 150);
        $this->assertEquals('50.00%', $calucaltor->toString(2));
    }

    public function testToFloatWithDecimals()
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::INCREASE, 100, 150);
        $this->assertEquals(50.00, $calucaltor->toFloat(2));
        $this->assertIsFloat($calucaltor->toFloat(2));
    }

    // to int
    public function testToInt()
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::INCREASE, 100, 150);
        $this->assertIsInt($calucaltor->toInt());
    }

    public function testCalculatePercentageIncreaseOf() {
        $calculator = PercentCalculator::calculatePercentage(PercentCalculator::INCREASEOF, 100, 50);
        $this->assertEquals(150, $calculator->getResult());
    }

    public function testCalculatePercentageDecreaseOf() {
        $calculator = PercentCalculator::calculatePercentage(PercentCalculator::DECREASEOF, 100, 50);
        $this->assertEquals(50, $calculator->getResult());
    }

}
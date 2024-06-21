<?php

namespace Mlab\MathPercentage\Service;

use DivisionByZeroError;
use Mlab\MathPercentage\Exception\MathException;

/**
 * Class PercentCalculator
 *
 * This class defines constants for various types of percentages used in calculations.
 * These constants can be used to specify the type of percentage calculation to be performed.
 */
class PercentCalculator extends Calculator
{
    /**
     * Represents an increase percentage between two numbers.
     */
    const INCREASE = 'increase';

    /**
     * Represents a decrease percentage between two numbers.
     */
    const DECREASE = 'decrease';

    /**
     * Represents a total percentage.
     */
    const TOTAL_PERCENTAGE = 'total_percentage';


    /**
     * Represents a margin percentage.
     */
    const MARGIN_PERCENTAGE = 'margin_percentage';

    /**
     * Represents an interest percentage.
     */
    const INTEREST_PERCENTAGE = 'interest_percentage';

    /**
     * Represents an increase percentage between two numbers.
     */
    const INCREASEOF = 'increaseof';

    /**
     * Represents a decrease percentage between two numbers.
     */
    const DECREASEOF = 'decreaseof';

    private function __construct(float $result)
    {
        $this->result = $result;
    }

    /**
     * Calculates the percentage based on the given type and numbers.
     *
     * @param string $type The type of percentage calculation to perform.
     * @param mixed ...$numbers The numbers to use for the calculation.
     * @return self The calculated percentage.
     */
    public static function calculatePercentage($type, ...$numbers)
    {
        $result = 0;
        $count = count($numbers);
        if ($count < 2) {
            throw new MathException('At least two numbers are required to calculate the percentage.');
        }

        try {
            switch ($type) {
                case self::INCREASE:
                    $result = self::calculateIncrease(...$numbers);
                    break;
                case self::DECREASE:
                    $result = self::calculateDecrease(...$numbers);
                    break;
                case self::TOTAL_PERCENTAGE:
                    $result = self::calculateTotalPercentage(...$numbers);
                    break;
                case self::MARGIN_PERCENTAGE:
                    $result = self::calculateMarginPercentage(...$numbers);
                    break;
                case self::INTEREST_PERCENTAGE:
                    $result = self::calculateInterestPercentage(...$numbers);
                    break;
                case self::INCREASEOF:
                    $result = self::increseOf(...$numbers);
                    break;
                case self::DECREASEOF:
                    $result = self::decreaseOf(...$numbers);
                    break;
                default:
                    throw new MathException("Invalid percentage calculation type '$type'. Only the following types are supported: increase, decrease, total_percentage, reference_percentage, average_percentage, margin_percentage, interest_percentage, participation_percentage.");
            }
        } catch (DivisionByZeroError) {
            $result = 0;
        }

        return new self($result);
    }

    /**
     * Calculates the percentage increase between two values.
     *
     * @param float $startValue The starting value.
     * @param float $endValue The ending value.
     * @return float The percentage increase.
     */
    private static function calculateIncrease($startValue, $endValue): float
    {   
        return (($endValue - $startValue) / $startValue) * 100;
    }

    /**
     * Calculates the percentage decrease between two values.
     *
     * @param float $startValue The starting value.
     * @param float $endValue The ending value.
     * @return float The percentage decrease.
     */
    private static function calculateDecrease($startValue, $endValue): float
    {
        return (($startValue - $endValue) / $startValue) * 100;
    }

    /**
     * Calculates the percentage of a part relative to a total.
     *
     * @param float $part The part value.
     * @param float $total The total value.
     * @return float The percentage of the part.
     */
    private static function calculateTotalPercentage($part, $total): float
    {
        return ($part / $total) * 100;
    }

    /**
     * Calculates the average percentage of a list of numbers.
     *
     * @param float ...$numbers The numbers.
     * @return float The average percentage.
     */
    private static function calculateAveragePercentage(...$numbers): float
    {
        $total = array_sum($numbers);
        $count = count($numbers);
        return ($total / $count) * 100;
    }

    /**
     * Calculates the margin percentage between a cost price and a selling price.
     *
     * @param float $costPrice The cost price.
     * @param float $sellingPrice The selling price.
     * @return float The margin percentage.
     */
    private static function calculateMarginPercentage($firstNumber, $secondNumber): float
    {
        try {
            return (($secondNumber - $firstNumber) / $secondNumber) * 100;
        } catch (DivisionByZeroError) {
            if($firstNumber == 0 && $secondNumber == 0) {
                return 0;
            } else {
                if($firstNumber > $secondNumber) {
                    return -100;
                } else {
                    return 100;
                }
            }
        }
    }

    /**
     * Calculates the interest amount based on a principal and an interest rate.
     *
     * @param float $principal The principal amount.
     * @param float $interestRate The interest rate.
     * @return float The interest amount.
     */
    private static function calculateInterestPercentage($principal, $interestRate): float
    {
        return $principal * ($interestRate / 100);
    }

    /**
     * Increases a number by a given percentage.
     *
     * @param float|int $number The number to be increased.
     * @param int $percentage The percentage by which to increase the number.
     * @return float|int The increased number.
     */
    protected static function increseOf(float|int $number, int $percentage)
    {
        $math = $number * $percentage;
        $math = $math / 100;
        return $number + $math;
    }

    /**
     * Decreases a number by a given percentage.
     *
     * @param float|int $number The number to be decreased.
     * @param int $percentage The percentage by which to decrease the number.
     * @return float|int The decreased number.
     */
    protected static function decreaseOf(float|int $number, int $percentage)
    {
        $math = $number * $percentage;
        $math = $math / 100;
        return $number - $math;
    }
}

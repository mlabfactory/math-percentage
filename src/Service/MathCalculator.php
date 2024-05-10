<?php
namespace Mlab\MathPercentage\Service;

use Mlab\MathPercentage\Exception\MathException;

class MathCalculator extends Calculator {

    /**
     * Represents an average.
     */
    const AVERAGE = 'average';

    /**
     * MathPercentageCalculator constructor.
     *
     * @param float $result The result of the percentage calculation.
     */
    public function __construct(float $result)
    {
        $this->result = $result;
    }

    
    /**
     * Calculates the percentage based on the given type, numbers, and percentage.
     *
     * @param string $type The type of percentage calculation to perform.
     * @param mixed ...$numbers The numbers to calculate the percentage for.
     * @return MathPercentageCalculator The instance of the MathPercentageCalculator class.
     */
    public static function calculate(string $type, ...$numbers): self
    {
        $result = 0;

        switch ($type) {
            case self::AVERAGE:
                $result = self::average($numbers);
                break;
            default:
                throw new MathException('Invalid percentage type specified.');
        }

        return new self($result);
    }

    /**
     * Calculates the average of the given numbers.
     *
     * @param array $numbers The numbers to calculate the average for.
     * @return float The calculated average.
     */
    protected static function average(array $numbers)
    {
        $result = 0;
        $count = count($numbers);
        if ($count < 2) {
            throw new MathException('At least two numbers are required to calculate the percentage.');
        }

        $result = array_sum($numbers) / $count;

        return $result;
        
    }

    /**
     * Returns the result as a string representation with a percentage sign.
     * @param int $decimal The number of decimal places to include in the result.
     * @return string The result as a string with a percentage sign.
     */
    public function toString(int $decimal = 2)
    {
        $result = number_format($this->result, $decimal);
        return (string) "$result";
    }

    
}
<?php
namespace Mlab\MathPercentage\Service;

class Calculator {

    /**
     * The result of the percentage calculation.
     */
    protected $result;

    /**
     * Returns the result as a string representation with a percentage sign.
     * @param int $decimal The number of decimal places to include in the result.   
     * @return string The result as a string with a percentage sign.
     */
    public function toString(int $decimal = 2)
    {
        $result = number_format($this->result, $decimal);
        return "$result%";
    }

    /**
     * Returns the result as a floating-point number.
     * @param int $decimal The number of decimal places to include in the result.
     * @return float The result as a floating-point number.
     */
    public function toFloat(int $decimal = 2)
    {
        return (float) number_format($this->result, $decimal);
    }

    /**
     * Returns the result as an integer.
     *
     * @return int The result as an integer.
     */
    public function toInt()
    {
        $result = round($this->result, 0, PHP_ROUND_HALF_UP);
        return (int) $result;
    }

    /**
     * Get the value of result
     */
    public function getResult()
    {
        return $this->result;
    }
}
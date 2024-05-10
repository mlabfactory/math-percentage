<?php

use Mlab\MathPercentage\Service\MathCalculator;
use Mlab\MathPercentage\Service\PercentCalculator;

/**
 * Calculates the increased percentage of the given numbers.
 *
 * @param mixed ...$numbers The numbers to calculate the percentage for.
 * @return float The calculated percentage.
 */
if (!function_exists('incresePercentage')) {
    function incresePercentage(...$numbers)
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::INCREASE,$numbers);
        return $calucaltor->toString();
    }
}

/**
 * Calculates the decreased percentage of the given numbers.
 *
 * @param mixed ...$numbers The numbers to calculate the percentage for.
 * @return float The calculated percentage.
 */
if (!function_exists('decreasePercentage')) {
    function decreasePercentage(...$numbers)
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::DECREASE,$numbers);
        return $calucaltor->toString();
    }
}

/**
 * Calculates the total percentage of the given numbers.
 *
 * @param mixed ...$numbers The numbers to calculate the percentage for.
 * @return float The calculated percentage.
 */
if (!function_exists('totalPercentage')) {
    function totalPercentage(...$numbers)
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::TOTAL_PERCENTAGE,$numbers);
        return $calucaltor->toString();
    }
}

/**
 * Calculates the margin percentage of the given numbers.
 *
 * @param mixed ...$numbers The numbers to calculate the percentage for.
 * @return float The calculated percentage.
 */
if (!function_exists('marginPercentage')) {
    function marginPercentage(...$numbers)
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::MARGIN_PERCENTAGE,$numbers);
        return $calucaltor->toString();
    }
}

/**
 * Calculates the interest percentage of the given numbers.
 *
 * @param mixed ...$numbers The numbers to calculate the percentage for.
 * @return float The calculated percentage.
 */
if (!function_exists('interestPercentage')) {
    function interestPercentage(...$numbers)
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::INTEREST_PERCENTAGE,$numbers);
        return $calucaltor->toString();
    }
}

/**
 * Calculates the increased percentage of the given numbers.
 * @param int|float $number The number to calculate the percentage for.
 * @param int $percentage The percentage to calculate.
 * @return float The calculated percentage.
 */
if (!function_exists('increseOfPercentage')) {
    function increseOfPercentage($number, $percentage)
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::INCREASEOF,$number, $percentage);
        return $calucaltor->toString();
    }
}

/**
 * Calculates the decreased percentage of the given numbers.
 * @param int|float $number The number to calculate the percentage for.
 * @param int $percentage The percentage to calculate.
 * @return float The calculated percentage.
 */
if (!function_exists('decreaseOfPercentage')) {
    function decreaseOfPercentage($number, $percentage)
    {
        $calucaltor = PercentCalculator::calculatePercentage(PercentCalculator::DECREASEOF,$number, $percentage);
        return $calucaltor->toString();
    }
}

/**
 * Calculates the average of the given numbers.
 *
 * @param array $numbers The numbers to calculate the average for.
 * @return float The calculated average.
 */
if (!function_exists('average')) {
    function average(array $numbers)
    {
        return MathCalculator::calculate(MathCalculator::AVERAGE, $numbers)->toString();
    }
}
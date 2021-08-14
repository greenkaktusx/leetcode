<?php
/**
 * Reverse Integer
 * https://leetcode.com/problems/reverse-integer/
 *
 * Given a signed 32-bit integer x, return x with its digits reversed.
 * If reversing x causes the value to go outside the signed 32-bit integer range [-2^31, 2^31 - 1], then return 0.
 * Assume the environment does not allow you to store 64-bit integers (signed or unsigned).
 */

class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $newValue =
            (int)(
                (preg_match('/-/is', $x) ? '-' : '') .
                join('', array_reverse(preg_split("//", abs($x), -1, PREG_SPLIT_NO_EMPTY)))
            );

        $min = -2 ** 31;
        $max = 2 ** 31;

        if ($newValue > $min && $newValue < $max) {
            return $newValue;
        }

        return 0;
    }
}

$testCases = [
    123,
    -123,
    120,
    0,
    999999999999,
    1234567890,
    1534236469
];

$solution = new Solution();

foreach ($testCases as $x) {
    echo $solution->reverse($x) . "<br/>";
}
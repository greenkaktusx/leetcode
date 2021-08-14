<?php
/**
 * Palindrome Number
 * https://leetcode.com/problems/palindrome-number/
 *
 * Given an integer x, return true if x is palindrome integer.
 * An integer is a palindrome when it reads the same backward as forward.
 * For example, 121 is palindrome while 123 is not.
 */

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        $reverseValue = join('', array_reverse(preg_split("//", abs($x), -1, PREG_SPLIT_NO_EMPTY)));

        if ((int)$reverseValue == $x) {
            return true;
        }

        return false;
    }
}

$testCases = [
    121,
    -121,
    10,
    -101,
    333
];

$solution = new Solution();

foreach ($testCases as $x) {
    echo (int)$solution->isPalindrome($x) . "<br/>";
}
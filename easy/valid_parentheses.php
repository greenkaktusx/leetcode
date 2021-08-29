<?php
/**
 * Valid Parentheses
 * https://leetcode.com/problems/valid-parentheses/
 *
 * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
 * An input string is valid if:
 * 1. Open brackets must be closed by the same type of brackets.
 * 2. Open brackets must be closed in the correct order.
 */

class Solution
{
    public $parentheses = [
        '(' => ')',
        '[' => ']',
        '{' => '}'
    ];

    /**
     * @param string $s
     * @return bool
     */
    function isValid(string $s): bool
    {
        $stack = [];

        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($this->parentheses[$s[$i]])) {
                $stack[] = $s[$i];
                continue;
            }

            if (isset(array_flip($this->parentheses)[$s[$i]])) {
                if (end($stack) == array_flip($this->parentheses)[$s[$i]]) {
                    unset($stack[count($stack) - 1]);
                    $stack = array_values($stack);
                    continue;
                } else {
                    return false;
                }
            }
        }

        return !$stack;
    }
}

$testCases = [
    '()',
    '()[]{}',
    '(]',
    '([)]',
    '{[]}'
];

$solution = new Solution();

foreach ($testCases as $testCase) {
    echo $testCase . ": " . ($solution->isValid($testCase) ? "True" : "False") . "<br/>";
}
<?php
/**
 * Two Sum
 * https://leetcode.com/problems/two-sum/
 *
 * Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.
 * You may assume that each input would have exactly one solution, and you may not use the same element twice.
 * You can return the answer in any order.
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        for ($i = 0; $i < count($nums); $i++) {
            $j = $i + 1;

            while ($j < count($nums)) {
                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }

                $j++;
            }
        }

        return [0, 0];
    }
}

$testCases = [
    [
        'nums' => [2, 7, 11, 15],
        'target' => 9
    ],
    [
        'nums' => [3, 2, 4],
        'target' => 6
    ],
    [
        'nums' => [3, 3],
        'target' => 6
    ],
    [
        'nums' => [3, 2, 3],
        'target' => 6
    ]
];

$solution = new Solution();

foreach ($testCases as $testCase) {
    var_dump($solution->twoSum($testCase['nums'], $testCase['target']));
}

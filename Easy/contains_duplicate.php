<?php
/**
 * Contains Duplicate
 * https://leetcode.com/problems/contains-duplicate/
 *
 * Given an integer array nums, return true if any value appears at least twice in the array,
 * and return false if every element is distinct.
 */

class Solution {
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $checkNums = [];

        foreach ($nums as $num) {
            if (in_array($num, $checkNums)) {
                return true;
            }

            $checkNums[] = $num;
        }

        return false;
    }
}
<?php
/**
 * Longest Common Prefix
 * https://leetcode.com/problems/longest-common-prefix/
 *
 * Write a function to find the longest common prefix string amongst an array of strings.
 * If there is no common prefix, return an empty string "".
 */

class Solution
{
    /**
     * @param string[] $strs
     * @return string
     */
    function longestCommonPrefix(array $strs): string
    {
        usort($strs, function ($a, $b) {
            $aLength = strlen($a);
            $bLength = strlen($b);

            if ($aLength == $bLength) {
                return 0;
            }

            return $aLength < $bLength ? -1 : 1;
        });

        $shortString = $strs[0];

        unset($strs[0]);

        $prefix = '';
        $findPrefix = false;

        for ($i = 0; $i < strlen($shortString); $i++) {
            $prefix = substr($shortString, 0, strlen($shortString) - $i);

            $stringsWithPrefix = array_filter($strs, function ($item) use ($prefix) {
                return substr($item, 0, strlen($prefix)) == $prefix;
            });

            if (count($stringsWithPrefix) == count($strs)) {
                $findPrefix = true;
                break;
            }
        }

        return $findPrefix ? $prefix : '';
    }
}

$testCases = [
    ["flower","flow","flight"],
    ["dog","racecar","car"]
];

$solution = new Solution();

foreach ($testCases as $testCase) {
    echo $solution->longestCommonPrefix($testCase) . "<br/>";
}
<?php
/**
 * Longest Substring Without Repeating Characters
 * https://leetcode.com/problems/longest-substring-without-repeating-characters/
 *
 * Given a string s, find the length of the longest substring without repeating characters.
 */

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        if (!$s) {
            return 0;
        }

        $substrings = [];

        $currentCharacterIndex = 0;
        $substringsCount = 0;

        while($currentCharacterIndex < strlen($s)) {
            if (!in_array($s[$currentCharacterIndex], $substrings[$substringsCount])) {
                $substrings[$substringsCount][] = $s[$currentCharacterIndex];
            } else {
                $substringsCount++;
                $currentCharacterIndex = $substringsCount;
                continue;
            }

            $currentCharacterIndex++;
        }

        $substrings = array_map(function($item) {
            return count($item);
        }, $substrings);

        rsort($substrings);

        return reset($substrings);
    }
}

$testCases = [
    'abcabcbb',
    'bbbbb',
    'pwwkew',
    'asdfgrewqsderfgtrasdfasedwsas'
];

$solution = new Solution();

foreach ($testCases as $string) {
    echo $solution->lengthOfLongestSubstring($string) . "<br/>";
}
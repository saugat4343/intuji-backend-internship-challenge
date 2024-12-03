<?php
function findPair($nums, $target) {
    // Create an associative array to store numbers we have seen
    $seen = [];
    
    foreach ($nums as $num) {
        // Calculate the required complement
        $complement = $target - $num;

        // Check if the complement is in the seen array
        if (isset($seen[$complement])) {
            echo "Pair found ($complement, $num)";
            return;
        }

        // Add the current number to the seen array
        $seen[$num] = true;
    }
    
    echo "Pair not found.";
}

// Example 1
$nums1 = [8, 7, 2, 5, 3, 1];
$target1 = 10;
findPair($nums1, $target1);
echo PHP_EOL;

// Example 2
$nums2 = [5, 2, 6, 8, 1, 9];
$target2 = 12;
findPair($nums2, $target2);
?>

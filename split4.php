<?php
$inputFile = 'master_part_4.txt';

if (!file_exists($inputFile)) {
    die("Error: Please make sure $inputFile is sitting in this exact folder before running this script.");
}

// Read the entire file into an array of lines
$lines = file($inputFile);
$totalLines = count($lines);
$targetChunkSize = ceil($totalLines / 2);

$currentChunk = 'A';
$currentChunkLines = [];
$accumulatedLines = 0;

foreach ($lines as $line) {
    // Check if we are approaching our target chunk size AND hitting a clean file separator
    if ($accumulatedLines >= $targetChunkSize && strpos($line, '================================================') !== false && $currentChunk === 'A') {
        // Save Part 4 A
        file_put_contents("master_part_4_A.txt", implode('', $currentChunkLines));
        
        // Reset counters for Part 4 B
        $currentChunk = 'B';
        $currentChunkLines = [];
        $accumulatedLines = 0;
    }
    
    $currentChunkLines[] = $line;
    $accumulatedLines++;
}

// Save Part 4 B containing whatever remains
if (!empty($currentChunkLines)) {
    file_put_contents("master_part_4_B.txt", implode('', $currentChunkLines));
}

echo "Success! Created master_part_4_A.txt and master_part_4_B.txt. You can now upload these two files.";
?>
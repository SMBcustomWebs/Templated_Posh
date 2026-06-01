<?php
$inputFile = 'master_codebase.txt';

if (!file_exists($inputFile)) {
    die("Error: $inputFile not found in this directory.");
}

// Read the entire file into an array of lines
$lines = file($inputFile);
$totalLines = count($lines);
$targetChunkSize = ceil($totalLines / 4);

$currentChunk = 1;
$currentChunkLines = [];
$accumulatedLines = 0;

foreach ($lines as $line) {
    // Check if we are approaching our target chunk size AND hitting a clean file separator
    if ($accumulatedLines >= $targetChunkSize && strpos($line, '================================================') !== false && $currentChunk < 4) {
        // Save the completed chunk
        file_put_contents("master_part_{$currentChunk}.txt", implode('', $currentChunkLines));
        
        // Reset counters for the next chunk
        $currentChunk++;
        $currentChunkLines = [];
        $accumulatedLines = 0;
    }
    
    $currentChunkLines[] = $line;
    $accumulatedLines++;
}

// Save the final 4th chunk containing whatever remains
if (!empty($currentChunkLines)) {
    file_put_contents("master_part_{$currentChunk}.txt", implode('', $currentChunkLines));
}

echo "Success! Created master_part_1.txt, master_part_2.txt, master_part_3.txt, and master_part_4.txt.";
?>
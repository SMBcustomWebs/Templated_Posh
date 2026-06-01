<?php
// Name of the output file
$outputFile = 'master_codebase.txt';

// Folders to ignore (we are ignoring 'assets' as requested, plus Couch core and images)
$ignoreFolders = ['!original', 'comm_admin/uploads', 'xmples']; 

// Allowed file types to include
$allowedExtensions = ['php', 'html', 'css', 'js', 'txt'];

$fileHandle = fopen($outputFile, 'w');
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));

foreach ($iterator as $file) {
    if ($file->isDir()) continue;
    
    // Check if it's in an ignored folder
    $path = $file->getPathname();
    $skip = false;
    foreach ($ignoreFolders as $ignore) {
        if (strpos($path, DIRECTORY_SEPARATOR . $ignore . DIRECTORY_SEPARATOR) !== false) {
            $skip = true; break;
        }
    }
    if ($skip) continue;

    // Check extension
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    if (in_array($ext, $allowedExtensions)) {
        // Write the header and file content
        $relativePath = str_replace(__DIR__, '', $path);
        fwrite($fileHandle, "\n\n================================================\n");
        fwrite($fileHandle, "FILE: " . ltrim($relativePath, '\\/') . "\n");
        fwrite($fileHandle, "================================================\n\n");
        fwrite($fileHandle, file_get_contents($path) . "\n");
    }
}
fclose($fileHandle);
echo "Done! Check your folder for master_codebase.txt";
?>
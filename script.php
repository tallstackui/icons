<?php

/**
 * This script is used to convert all SVG files in a folder to
 * Blade components. Read the README.md file for more information.
 * @author AJ Meireles
 */

require __DIR__ . '/vendor/autoload.php';

function output(string $message, bool $die = true)
{
    echo "\n" . $message . "\n" . PHP_EOL;

    if ($die) {
        exit;
    }
}

if (($folder = $_SERVER['argv'][1]) === '') {
    output("You must specific the folder name.");
}

$main = __DIR__.'/'.$folder;

if (!is_dir($main)) {
    output("The folder [$folder] does not exist!");
}

$folders = array_filter(scandir($main), fn ($item) => is_dir($main . '/' . $item) && !in_array($item, ['.', '..']));

foreach ($folders as $sub) {

    $folder = $main . '/' . $sub;

    foreach (scandir($folder) as $file) {
        if ($file === '.' || $file === '..') continue;
        if (pathinfo($file, PATHINFO_EXTENSION) !== 'svg') continue;

        $filepath = $folder . '/' . $file;
        $content = file_get_contents($filepath);
        
        $modifiedContents = preg_replace('/<svg(.*?)>/', '<svg {{ $attributes }}$1>', $content);
        
        $name = pathinfo($file, PATHINFO_FILENAME) . '.blade.php';
        $path = $folder . '/' . $name;
        
        file_put_contents($path, $modifiedContents);

        if (pathinfo($file, PATHINFO_EXTENSION) === 'svg') unlink($filepath);
    }
}

output("Done!");

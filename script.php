<?php

require __DIR__ . '/vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__)->safeLoad();

if ($_ENV['FOLDER'] === '') {
    echo "The main folder is not set in the .env file.";

    exit;
}

$folder = $_ENV['FOLDER'];
$main = __DIR__.'/'.$folder; // change the PATH to the folder where the SVG files are located

if (!is_dir($main)) {
    echo "The main folder [$folder] does not exist!";

    exit;
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

echo "\nDone!\n" . PHP_EOL;

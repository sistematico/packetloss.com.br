<?php

$path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'txt'. DIRECTORY_SEPARATOR . 'counter.txt';

if (!is_dir(dirname($path))) mkdir(dirname($path), 0755);
if (!is_file($path)) touch($path);

if (is_readable($path)) {
    $file  = fopen($path, 'r');
    $count = fgets($file, 1000);
    $count = abs(intval($count)) + 1;
    $count = empty($count) ? 1 : $count;

    if (is_writeable($path) && isset($_POST['increment']) && $_POST['increment'] == true) {
        fclose($file);
        $file = fopen($path, 'w');
        fwrite($file, $count);
    }

    fclose($file);
    echo $count;
} else {
    echo '0';
}

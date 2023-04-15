<?php

require __DIR__ . '/../vendor/autoload.php';

use Carlos\Cache;

function powTest(mixed $n, mixed $exp): mixed
{
    echo "Calculating $n ^ $exp" . PHP_EOL;
    return $n ** $exp;
}

$pow = Cache::memoizate('powTest');

echo $pow(2, 2) . PHP_EOL;
echo $pow(2, 3) . PHP_EOL;
echo $pow(2, 2) . PHP_EOL;
echo $pow(2, 2) . PHP_EOL;
echo $pow(2, 3) . PHP_EOL;
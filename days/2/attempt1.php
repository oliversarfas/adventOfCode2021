<?php

// [x, y]
$location = [
    'x' => 0, // horizontal position
    'y' => 0, // depth
];

$data = file('./data.txt');

foreach ($data as $key => $instruction) {
    $parts = explode(' ', $instruction);
    if ($parts[0] === 'forward') {
        $location['x'] += (int) $parts[1];
    } elseif ($parts[0] === 'down') {
        $location['y'] += (int) $parts[1];
    } elseif ($parts[0] === 'up') {
        $location['y'] -= (int) $parts[1];
    }
}

echo $location['x'] * $location['y'];
exit;


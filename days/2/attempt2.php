<?php

$location = [
    'x' => 0, // horizontal position
    'y' => 0, // depth
    'aim' => 0, // aim
];

$data = file('./data.txt');

foreach ($data as $key => $instruction) {
    $parts = explode(' ', $instruction);
    if ($parts[0] === 'forward') {
        $location['x'] += (int)$parts[1];
        $location['y'] += $location['aim'] * (int)$parts[1]; // increases y by aim * X
    } elseif ($parts[0] === 'down') {
        $location['aim'] += (int) $parts[1];
    } elseif ($parts[0] === 'up') {
        $location['aim'] -= (int) $parts[1];
    }
}

echo $location['x'] * $location['y'];
exit;


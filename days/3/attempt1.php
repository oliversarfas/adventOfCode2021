<?php

$data = file(__DIR__.'/data.txt');

$epsilon = '';
$gamma = '';

$length = strlen(trim($data[0]));

// All readings are the same length, check the bit in each position
for ($i = 0; $i < $length; $i++)
{
    $totals = [
        0 => 0,
        1 => 0,
    ];

    foreach ($data as $line) {
        if((int)$line[$i] === 0) {
            $totals[0]++;
        } else {
            $totals[1]++;
        }
    }

    if($totals[0] > $totals[1]) {
        $gamma .= '1';
        $epsilon .= '0';
    } else {
        $gamma .= '0';
        $epsilon .= '1';
    }

}
// Power = product of DEC E, DEC G
echo bindec($epsilon)*bindec($gamma);
exit;
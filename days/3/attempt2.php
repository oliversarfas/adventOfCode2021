<?php

$data = $oxygen = $carbon = file(__DIR__.'/data.txt');

for($i=0; $i<12; $i++) {
    $totals = [
        [ // Oxygen ratings
            0 => 0,
            1 => 0,
        ], [ // Carbon Ratings
            0 => 0,
            1 => 0,
        ]
    ];

    if(sizeof($oxygen) > 1)
    foreach ($oxygen as $oxyLine) {
        $totals[0][$oxyLine[$i]]++;
    }

    if ($totals[0][0] > $totals[0][1]) { // If 0 is more common in Oxy readings
        $oxygen = array_filter($oxygen, fn($value) => $value[$i] === '0'); // Remove all other than 0
    } else {
        $oxygen = array_filter($oxygen, fn($value) => $value[$i] === '1'); // Remove all other than 1
    }

    if(sizeof($carbon) > 1) {
        foreach ($carbon as $carbonLine) {
            $totals[1][$carbonLine[$i]]++;
        }

        if ($totals[1][0] > $totals[1][1]) { // If 0 is more common in Carbon readings
            $carbon = array_filter($carbon, fn($value) => $value[$i] === '1'); // Remove all other than 1
        } else {
            $carbon = array_filter($carbon, fn($value) => $value[$i] === '0'); // Remove all other than 0
        }
    }
}

$oxygen = array_pop($oxygen);
$carbon = array_pop($carbon);

// Life support is Oxygen product with Carbon
echo bindec($oxygen) * bindec($carbon);
exit;
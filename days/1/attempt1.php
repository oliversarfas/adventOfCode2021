<?php

$scanItems = json_decode(file_get_contents('./input1.json'));

$increases = 0;

foreach ($scanItems as $key=>$value) {
    if($key === 0) {
        continue;
    }
    if($value > $scanItems[$key-1]) {
        $increases++;
    }
}

print $increases;
exit;
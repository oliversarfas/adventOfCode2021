<?php

$scanItems = file(__DIR__.'/data.txt');

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
<?php

$scanItems = json_decode(file_get_contents('input1.json'));
$groupIncreases = 0;

function getSumForIndex(array $array, int $index): int
{
    if(!isset($array[$index], $array[$index+1], $array[$index+2])) {
        return 0;
    }
    return $array[$index] + $array[$index+1] + $array[$index+2];
}

foreach ($scanItems as $key=>$value) {
    $sumCurrentIndex = getSumForIndex($scanItems, $key);
    $sumPreviousIndex = getSumForIndex($scanItems, $key - 1);
    if(!$sumCurrentIndex || !$sumPreviousIndex) {
        continue;
    }
    if($sumCurrentIndex > $sumPreviousIndex){
        $groupIncreases++;
    }
}

echo $groupIncreases;
exit;
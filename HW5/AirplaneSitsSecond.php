<?php
function planeSeat($a)
{
    $positionMap = ['A' => 'Left', 'B' => 'Left', 'C' => 'Left',
        'D' => 'Middle', 'E' => 'Middle', 'F' => 'Middle',
        'G' => 'Right', 'H' => 'Right', 'K' => 'Right'];

    $num = intval($a);
    $letter = $a[mb_strlen($a) - 1];

    if ($num > 60 || !array_key_exists($letter, $positionMap)) {
        return 'No Seat!!';
    }

    $firstPart = $num > 20 ? $num > 40 ? 'Back-' : 'Middle-' : 'Front-';
    $secondPart = $positionMap[$letter];

    return $firstPart . $secondPart;
}

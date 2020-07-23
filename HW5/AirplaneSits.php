<?php
function planeSeat($a)
{
    $num = intval($a);
    $letter = $a[mb_strlen($a) - 1];

    if ($num < 1 || $num > 60 || in_array($letter, ['I', 'J']) ||
        !'A' | 'B' | 'C' | 'D' | 'E' | 'F' | 'G' | 'H' | 'K' | 'L' | 'M' | 'N' | 'O' | 'P' | 'R' | 'S' | 'T' | 'Y' | 'Q' | 'W' | 'X' | 'V' | 'Z') {
        return 'No Seat!!';
    }

    $firstPart = $num > 20 ? $num > 40 ? 'Back-' : 'Middle-' : 'Front-';
    $secondPart = $letter > 'C' ? $letter > 'F' ? 'Right' : 'Middle' : 'Left';

    return $firstPart . $secondPart;
}

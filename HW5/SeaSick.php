<?php
function sea_sick(string $s): string
{
    $riskyWaves = 0;
    $seaMoodLen = mb_strlen($s) - 1;
    for ($i = 0; $i < $seaMoodLen; $i++) {
        if ($s[$i] !== $s[$i + 1]) {
            $riskyWaves++;
        }
    }

    if ($riskyWaves > ($seaMoodLen * 0.2)) {
        return 'Throw Up';
    }

    return 'No Problem';
}

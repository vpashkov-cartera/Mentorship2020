<?php
function sea_sick(string $s): string
{
    return substr_count($s, '_~') + substr_count($s, '~_') > strlen($s) / 5 ? 'Throw Up' : 'No Problem';
}

<?php

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nd_temp);
$nd = explode(' ', $nd_temp);

$n = intval($nd[0]);
$d = intval($nd[1]);

fscanf($stdin, "%[^\n]", $a_temp);

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

if ($d > $n || $d < 1) exit();

for ($i = 0; $i < $n; $i++) {
    $index = ($i + $d) % $n;
    printf('%d%s', $a[$index], $i > $n - 1 ?: ' ');
}

fclose($stdin);

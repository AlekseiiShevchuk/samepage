<?php
$a = [1, 2, 3];

foreach ($a as $key => $val) {
    if ($val > 1) {
        unset($a[$key]);
    }
}

var_dump($a);
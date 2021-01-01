<?php

function check_string(string $var, string $alt = ''): string {
    return !empty(trim($var)) ? $var : $alt;
}

function get_inits(string $var): string {
    $split = explode(' ', trim($var), 2);
    if ( count($split) < 2 )
        return substr($split, 0, 2);

    $inits = '';
    for ($i = 0; $i < count($split); $i++) {
        $inits .= strtoupper(substr($split[$i], 0, 1));
    }
    return $inits;
}
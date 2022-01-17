<?php

if (!function_exists('price_format')) {
    function price_format($price, $currency = 'zł'): string
    {
        return number_format($price, 2, ',', ' ') . '&nbsp;'. $currency;
    }
}

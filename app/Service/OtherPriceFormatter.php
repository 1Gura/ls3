<?php


namespace App\Service;


use App\PriceFormatter;

class OtherPriceFormatter implements PriceFormatter
{

    public function format($value): string
    {
        return number_format($value, 2, '.', ' ') . ' рубли';
    }
}

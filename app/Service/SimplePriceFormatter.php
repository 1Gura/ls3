<?php


namespace App\Service;


use App\PriceFormatter;

class SimplePriceFormatter implements PriceFormatter
{

    public function format($value)
    {
        return $value . ' рубли';
    }
}

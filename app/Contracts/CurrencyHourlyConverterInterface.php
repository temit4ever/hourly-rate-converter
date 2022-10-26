<?php

namespace App\Contracts;

interface CurrencyHourlyConverterInterface
{
    public function  convertHourlyRateBasedOnCurrency(?string $userCurrency, float $amount);


}

<?php

namespace App\Interfaces;

interface CurrencyHourlyConverterInterface
{
    public function  convertHourlyRateBasedOnCurrency(?string $userCurrency, int $amount);


}

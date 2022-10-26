<?php

namespace App\Services;

use App\Interfaces\CurrencyHourlyConverterInterface;
use App\Services\ExternalConversion\ExternalConversionService;

class ExternalService implements CurrencyHourlyConverterInterface
{
    public function __construct(protected ExternalConversionService $externalConversion)
    {
    }

    /**
     * @param string|null $userCurrency
     * @param float $amount
     * @return array|null
     */
    public function convertHourlyRateBasedOnCurrency(?string $userCurrency, float $amount): ?array
    {
       return $this->externalConversion?->externalRateConversion($userCurrency, $amount);
    }





}

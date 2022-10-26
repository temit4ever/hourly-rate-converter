<?php

namespace App\Services;

use App\Contracts\CurrencyHourlyConverterInterface;
use App\Services\LocalConversion\LocalConversionService;

class LocalServices implements CurrencyHourlyConverterInterface
{
    public function __construct(protected LocalConversionService $localRateServices)
    {
    }

    /**
     * @param string|null $userCurrency
     * @param float $amount
     * @return array
     */
    public function convertHourlyRateBasedOnCurrency(?string $userCurrency, float $amount): array
    {
        return $this->localRateServices->getRateConversionLocally($userCurrency, $amount);
    }
}

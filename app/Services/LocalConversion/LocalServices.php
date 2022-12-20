<?php

namespace App\Services\LocalConversion;

use App\Interfaces\CurrencyHourlyConverterInterface;

class LocalServices implements CurrencyHourlyConverterInterface
{
    public function __construct(protected LocalConversionService $localRateServices)
    {
    }

    /**
     * @param string|null $userCurrency
     * @param int $amount
     * @return array
     */
    public function convertHourlyRateBasedOnCurrency(?string $userCurrency, int $amount): array
    {
        return $this->localRateServices->getRateConversionLocally($userCurrency, $amount);
    }
}

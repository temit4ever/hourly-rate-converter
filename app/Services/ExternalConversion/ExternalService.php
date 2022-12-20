<?php

namespace App\Services\ExternalConversion;

use App\Interfaces\CurrencyHourlyConverterInterface;

class ExternalService implements CurrencyHourlyConverterInterface
{
    public function __construct(protected ExternalConversionService $externalConversion)
    {
    }

    /**
     * @param string|null $userCurrency
     * @param int $amount
     * @return array|null
     */
    public function convertHourlyRateBasedOnCurrency(?string $userCurrency, int $amount): ?array
    {
       return $this->externalConversion?->externalRateConversion($userCurrency, $amount);
    }





}

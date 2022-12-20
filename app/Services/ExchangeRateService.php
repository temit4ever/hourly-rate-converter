<?php

namespace App\Services;

use App\Services\ExternalConversion\ExternalService;
use App\Services\LocalConversion\LocalServices;

class ExchangeRateService
{
    public function __construct(
        protected ExternalService $externalCurrencyConversionDriver,
        protected LocalServices   $localCurrencyConversionDriver,
    )
    {
    }

    /**
     * @param $userCurrency
     * @param $userRate
     * @return array|null
     */
    public function retrieveExchangeRate($userCurrency, $userRate): ?array
    {
        if (config('services.exchange-rate.external')) {
            return $this->externalCurrencyConversionDriver?->convertHourlyRateBasedOnCurrency(
                $userCurrency ?? null,
                $userRate ?? null
            );
        }
        else {
            return $this->localCurrencyConversionDriver?->convertHourlyRateBasedOnCurrency(
                $userCurrency ?? null,
                $userRate ?? null
            );

        }
    }
}

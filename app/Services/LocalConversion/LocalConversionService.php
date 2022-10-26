<?php

namespace App\Services\LocalConversion;

use App\CurrencyType\CurrencyType;


class LocalConversionService
{
    public function __construct(protected CurrencyType $currencyType)
    {
    }

    /**
     * @param $userCurrency
     * @param $amount
     * @return array
     */
    public function getRateConversionLocally($userCurrency, $amount): array
    {
        $currencyRateConversion = [];
        $currencyRate = $this->currencyType?->localExchangeRate();
        $otherCurrencyRates = $currencyRate[$userCurrency];
        foreach($otherCurrencyRates['rates'] as $symbol => $rate) {
            $currencyRateConversion['local_conversion'][$symbol] = [
                'amount' => $amount,
                'from' => $userCurrency,
                'to' => $symbol,
                'rates' => $rate,
                'total_conversion' => round($amount * $rate, 2)
            ];
        }

        return $currencyRateConversion;
    }
}

<?php

namespace App\CurrencyType;

use Illuminate\Support\Arr;

class CurrencyType
{
    /**
     * @return array|null
     */
    public function getCurrencyTypes(): ?array
    {
        return config('app.currency.code-symbols');
    }

    /**
     * @return array|null
     */
    public function localExchangeRate(): ?array
    {
        return config('app.default.local-converter');
    }

    /**
     * @param $userCurrency
     * @return array|void
     */
    public function CurrencyTypeToConvert($userCurrency)
    {
        $flattenArray = Arr::flatten($this->getCurrencyTypes());

        if (in_array($userCurrency, $flattenArray)) {
            $pos = array_search($userCurrency, $flattenArray);
            unset($flattenArray[$pos]);
            return array_values($flattenArray);
        }
    }

}

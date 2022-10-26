<?php

namespace App\Services\ExternalConversion;

use App\CurrencyType\CurrencyType;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExternalConversionService
{

    public function __construct
    (
        protected ?string $baseUrl,
        protected ?int $retryTimes,
        protected ?int $retryMilliseconds,
        protected CurrencyType $currencyType,
    ){}

    /**
     * Retrieve data from the External API call
     *
     * @param string|null $userCurrency
     * @return array|mixed|void
     */
    public function getRateExternally(?string $userCurrency)
    {
        $getCurrency = $this->currencyType->CurrencyTypeToConvert($userCurrency);
        $currencies = '';
        if (!empty($getCurrency)) {
            $currencies = implode(',', $getCurrency);
        }
        try {
            $response = Http::withHeaders($this->setHeader())
                ->retry(
                    $this->retryTimes,
                    $this->retryMilliseconds,
                )
                ->get($this->baseUrl . "symbols=${currencies}&base={$userCurrency}");

            return $response->json();

        }
        catch (Exception $exception)
        {
            Log::error($exception);
        }
    }

    /**
     * @param $currency
     * @param $amount
     * @return array
     */
    public function externalRateConversion($currency, $amount): array
    {
        $currencyRateConversion = [];
        $currencyTo = $this->currencyType?->CurrencyTypeToConvert($currency);
        $externalRate = $this->getRateExternally($currency);
        foreach($currencyTo as $symbol) {
            $currencyRateConversion['external_conversion'][$symbol] = [
                'amount' => $amount,
                'from' => $currency,
                'to' => $symbol,
                'rates' => $externalRate['rates'][$symbol],
                'total_conversion' => round($amount * $externalRate['rates'][$symbol], 2)
            ];
        }
        return $currencyRateConversion;
    }

    /**
     * @return array
     */
    public function setHeader(): array
    {
        return [
            "Content-Type" => "text/plain",
            "apikey" => config('services.exchange-rate.key'),
        ];
    }

}


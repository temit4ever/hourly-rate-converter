<?php

namespace App\Actions\User;

use App\CurrencyType\CurrencyType;
use App\Models\User;
use App\Services\ExchangeRateService;
use App\Services\ExternalConversion\ExternalService;
use App\Services\LocalConversion\LocalServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class ViewUserDetails
{
    public function __construct(
        protected ExternalService     $externalCurrencyConversionDriver,
        protected LocalServices       $localCurrencyConversionDriver,
        protected CurrencyType        $currencyType,
        protected ExchangeRateService $exchangeRateConfig,
    )
    {
    }

    use AsAction;
    public function handle($id)
    {
        $user = User::findOrFail($id);
        return [
            'userDetails' => $user,
            'exchangeRate' => $this->exchangeRateConfig->retrieveExchangeRate(
                $user->currency,
                $user->rate
            ),
        ];
    }

    public function asController($id)
    {
        return $this->handle($id);
    }

    public function jsonResponse(?array $data): \Illuminate\Http\JsonResponse
    {
        return response()->json($data);
    }
}

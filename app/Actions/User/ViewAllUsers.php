<?php

namespace App\Actions\User;

use App\CurrencyType\CurrencyType;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class ViewAllUsers
{
    use AsAction;
    public function __construct(protected CurrencyType $currencyType)
    {
    }
    public function handle(): ?array
    {
        try {
            return [
                'users' => User::all()->toArray(),
                'currencyTypes' => $this->currencyType->getCurrencyTypes(),
            ];
        }
        catch (Exception $e) {
            Log::error($e);
        }
    }

    public function htmlResponse(?array $data)
    {
        return view('user.user-list', $data);
    }
}

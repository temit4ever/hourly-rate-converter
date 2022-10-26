<?php

namespace App\Actions\User;

use App\CurrencyType\CurrencyType;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowUserForm
{
    use AsAction;

    public function __construct(protected CurrencyType $currencyType)
    {
    }

    public function handle()
    {
        return [
            'currencyTypes' => $this->currencyType->getCurrencyTypes(),
        ];
    }

    public function htmlResponse(array $data): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.create-user', $data);
    }
}

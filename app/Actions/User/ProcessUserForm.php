<?php

namespace App\Actions\User;
use App\Models\User;
use App\ValidationRules\UserValidationRules;
use Exception;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;


class ProcessUserForm
{
    use AsAction;
    use UserValidationRules;

    public function handle(ActionRequest $actionRequest): void
    {
        try {
            User::create($actionRequest->validated());
        }
        catch (Exception $exception){
            Log::error($exception);
        }
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle($request);
    }

    public function htmlResponse()
    {
        return response()->redirectTo('/');
    }
}

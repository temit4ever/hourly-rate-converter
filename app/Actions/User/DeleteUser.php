<?php

namespace App\Actions\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteUser
{
    use AsAction;

    public function handle($id)
    {
        try {
            return User::findOrFail($id)->delete();
        }
        catch (Exception $exception)
        {
            Log::error($exception);
        }
    }

    public function asController($id)
    {
        return $this->handle($id);
    }

    public function htmlResponse($data)
    {
        return redirect('/');
    }

}

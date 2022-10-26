<?php

namespace App\ValidationRules;

trait UserValidationRules
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'company_name' => [
                'required',
                'string',
            ],
            'occupation' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
            ],
            'rate' => [
                'required',
                'numeric',
            ],
            'currency' => [
                'required',
                'string',
            ],
        ];
    }
}

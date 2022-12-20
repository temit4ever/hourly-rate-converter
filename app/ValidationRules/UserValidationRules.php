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
                'max:255',
            ],
            'company_name' => [
                'required',
                'string',
                'max:255',
            ],
            'occupation' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'max:255',
            ],
            'rate' => [
                'required',
                'numeric',
                'digits:2',
            ],
            'currency' => [
                'required',
                'string',
                'max:3',
            ],
        ];
    }
}

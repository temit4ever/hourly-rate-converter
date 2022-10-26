<?php

namespace Tests\Feature\Rates;

use App\CurrencyType\CurrencyType;
use App\Models\User;
use App\Services\ExternalConversion\ExternalConversionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;
use Tests\TestCase;

class LocalRatesTest extends TestCase
{
    use RefreshDatabase;
    protected object $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_get_local_rate(): void
    {

        $actual =
            [
                'USD' => [
                    'rates' => [
                        'EUR' => 0.8,
                        'GBP' => 0.7,
                    ]
                ],
                'EUR' => [
                    'rates' => [
                        'GBP' => 0.9,
                        'USB' => 1.2
                    ]
                ],
                'GBP' => [
                    'rates' => [
                        'EUR' => 1.1,
                        'USB' => 1.3
                    ]
                ],
            ];

        $expected = app(CurrencyType::class)->localExchangeRate(
            $this->user->currency,
        );

        $this->assertEquals($expected, $actual);
        $this->assertNotNull($expected);
    }

}

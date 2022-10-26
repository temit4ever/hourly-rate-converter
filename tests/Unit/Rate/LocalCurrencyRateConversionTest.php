<?php

namespace Tests\Unit\Rate;

use App\CurrencyType\CurrencyType;
use App\Models\User;
use App\Services\LocalConversion\LocalConversionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class LocalCurrencyRateConversionTest extends TestCase
{
    use RefreshDatabase;
    protected object $user;
    protected LocalConversionService $localRateService;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_get_local_conversion_rate(): void
    {
        $actual = [
            "local_conversion" => [
                "GBP" => [
                    "amount" => 430.34,
                    "from" => "EUR",
                    "to" => "GBP",
                    "rates" => 0.9,
                    "total_conversion" => 387.31
                ],
                "USB" => [
                    "amount" => 430.34,
                    "from" => "EUR",
                    "to" => "USB",
                    "rates" => 1.2,
                    "total_conversion" => 516.41
                ]
            ]
        ];

        Mockery::mock(CurrencyType::class, fn(MockInterface $mock) => (
        $mock->shouldReceive('localExchangeRate')));
        $expected = app(LocalConversionService::class)->getRateConversionLocally(
            $this->user->currency, $this->user->rate
        );
        $this->assertNotNull($expected);
        $this->assertEquals($expected, $actual);
        $this->assertArrayHasKey('local_conversion', $expected);

    }
}

<?php

namespace Tests\Unit\Rate;

use App\CurrencyType\CurrencyType;
use App\Models\User;
use App\Services\ExternalConversion\ExternalConversionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ExternalCurrencyConversionTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }
    public function test_can_get_external_conversion_rate(): void
    {
        \Mockery::mock(CurrencyType::class);
        $expected = app(ExternalConversionService::class)->externalRateConversion(
            $this->user->currency, $this->user->rate
        );

        $this->assertNotNull($expected);
        $this->assertArrayHasKey('external_conversion', $expected);
    }
}

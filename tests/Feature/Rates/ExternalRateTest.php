<?php

namespace Tests\Feature\Rates;

use App\CurrencyType\CurrencyType;
use App\Models\User;
use App\Services\ExternalConversion\ExternalConversionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;
use Tests\TestCase;

class ExternalRateTest extends TestCase
{
    use RefreshDatabase;
    protected object $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_get_external_rates(): void
    {
        \Mockery::mock(CurrencyType::class, fn(MockInterface $mock) => (
        $mock->shouldReceive('CurrencyTypeToConvert')->with($this->user->currency)));
        $expected = app(ExternalConversionService::class)->getRateExternally(
            $this->user->currency,
        );

        $this->assertNotNull($expected);
        $this->assertArrayHasKey('rates', $expected);
    }
}

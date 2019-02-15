<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaymentTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListCards()
    {
        $data = factory(\App\Payment::class, 10)->create();
        $response = $this->get('/api/payments');
        $response->assertStatus(200);
    }

    public function testCheckoutAlwaysActive()
    {
        $plans = factory(\App\Plan::class, 3)->create();

        $users = factory(\App\User::class, 10)->create();

        $data = [
            'user_id' => '1',
            'plan_id' => '1',
            'card_name' => 'João da Silva',
            'card_number' => '4893111111111111',
            'card_expiration' => '12/26',
            'card_cvv' => '111',
        ];
        $response = $this->json('POST', 'api/payments/checkout', $data);
        $response->assertStatus(200);
    }

    public function testCheckoutAlwaysInactive()
    {
        $plans = factory(\App\Plan::class, 3)->create();

        $users = factory(\App\User::class, 10)->create();

        $data = [
            'user_id' => '1',
            'plan_id' => '1',
            'card_name' => 'João da Silva',
            'card_number' => '4893222222222222',
            'card_expiration' => '12/23',
            'card_cvv' => '222',
        ];
        $response = $this->json('POST', 'api/payments/checkout', $data);
        $response->assertStatus(404);
    }
}

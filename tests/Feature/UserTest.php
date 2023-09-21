<?php

namespace Tests\Feature;

use App\Models\Client\Client;
use App\Models\Client\CreditCard\CreditCardRequest;
use App\Models\User\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_registered_users_can_login(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->post('/submit', [
            'phone' => $user->phone
        ]);

        $this->post('/verify', [
            'phone' => $user->phone,
            'login_code' => $user->refresh()->login_code
        ])->assertRedirect('/users');
    }

    public function test_unregistered_users_cannot_login(): void
    {
        $this->post('/submit', [
            'phone' => '998900223123'
        ])->assertSessionHasErrors();
    }

    public function test_admin_can_see_users()
    {
        $this->actingAsAdmin();

        $this->get('/users')
            ->assertSee('Users')
            ->assertOk();
    }

    public function test_admin_can_create_users()
    {
        $this->actingAsAdmin();

        $user = User::factory()->make();

        $this->post('/users', $user->toArray());

        $this->assertDatabaseHas('users', [
            'full_name' => $user->full_name
        ]);
    }

    public function test_admin_can_edit_users()
    {
        $this->actingAsAdmin();

        $user = User::factory()->create();

        $this->post($user->path(), [
            'full_name' => 'Boburmirzo Kozimov'
        ]);

        $this->assertDatabaseHas('users', [
            'full_name' => 'Boburmirzo Kozimov'
        ]);
    }

    public function test_admin_can_delete_users()
    {
        $this->actingAsAdmin();

        $user = User::factory()->create();

        $this->delete($user->path());

        $this->assertDatabaseMissing('users', $user->toArray());
    }

    public function test_admin_can_filter_users()
    {
        $this->actingAsAdmin();

        $firstUser = User::factory()->create();
        $secondUser = User::factory()->create();

        $this->get('/users?full_name=' . $firstUser->full_name)
            ->assertSee($firstUser->full_name)
            ->assertDontSee($secondUser->full_name);
    }

    public function test_admin_can_create_clients()
    {
        $this->actingAsAdmin();
        $client = Client::factory()->make();

        $this->post('/clients', $client->toArray())
            ->assertRedirect('/clients');

        $this->assertDatabaseHas('clients', ['full_name' => $client->full_name]);
    }


    public function test_admin_can_edit_clients()
    {
        $this->actingAsAdmin();

        $client = Client::factory()->create();

        $this->post($client->clientPath(), [
            'full_name' => 'Boburmirzo Kozimov'
        ]);

        $this->assertDatabaseHas('users', [
            'full_name' => 'Boburmirzo Kozimov'
        ]);
    }

    public function test_admin_can_delete_clients()
    {
        $this->actingAsAdmin();

        $client = Client::factory()->create();

        $this->delete($client->clientPath())
            ->assertRedirect('/clients');

        $this->assertDatabaseMissing('clients', [
            'id' => $client->id
        ]);
    }

    public function test_admin_can_create_credit_card_request()
    {
        $this->actingAsAdmin();
        $client = Client::factory()->create();
        $cardRequest = CreditCardRequest::factory(['client_id' => $client->id])->make();

        $this->post($client->clientPath() . '/manage-credit-card', $cardRequest->toArray());

        $this->assertDatabaseHas('credit_card_requests', [
            'client_id' => $cardRequest->client_id,
        ]);
    }
}

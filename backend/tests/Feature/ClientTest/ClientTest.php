<?php

namespace Tests\Feature\ClientTest;

use App\Models\Client\Client;
use Tests\TestCase;

class ClientTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_admin_can_see_all_users(): void
    {
        $this->withoutExceptionHandling();
        $this->actingAsAdmin();

        $this->get('/clients')
            ->assertOk();
    }

    public function test_guest_cannot_create_a_new_user(): void
    {
        $client = Client::factory()->raw();

        $this->post('/clients', $client);

        $this->assertDatabaseMissing('clients', $client);
    }

    public function test_admin_can_delete_the_client(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $client = Client::factory()->create();

        $this->delete($client->clientPath())
            ->assertRedirect();

        $this->assertDatabaseMissing('clients', [
            'id' => $client->id
        ]);
    }

    public function test_admin_can_create_a_new_client(): void
    {
        $this->actingAsAdmin();

        $client = Client::factory()->raw();

        $this->post('/clients', $client)
            ->assertRedirect();

        $this->assertDatabaseHas('clients', $client);
    }

    public function test_admin_can_update_the_client(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $client = Client::factory()->create();

        $this->patch($client->clientPath(), [
            'full_name' => 'Boburmirzo',
            'phone' => $client->phone,
            'auth_key' => $client->auth_key,
            'is_active' => true,
        ]);

        $client->refresh();

        $this->assertDatabaseHas('clients', [
            'full_name' => 'Boburmirzo',
            'is_active' => true,
        ]);
    }
}

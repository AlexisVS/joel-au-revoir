<?php

use App\Models\GoodbyeCard;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Can get all goodbye card from API', function () {
    GoodbyeCard::factory(2)->create();

    $response = $this->getJson('/api/goodbye-cards')->assertStatus(200);

    $response->assertStatus(200);
});

test('Can create a goodbye card', function () {
    $response = $this->postJson('/api/goodbye-cards', [
        "author_name" => "Alexis",
        "message" => "bonjour",
        "card_color" => "#426754",
        "has_asset" => false
    ]);

    $response->assertStatus(200);
    $response->assertJson(['message' => 'Goodbye card created successfully']);
});

test('Can get a goodbye card from API', function () {
    $goodbyeCard = GoodbyeCard::factory()->create();

    $response = $this->getJson('/api/goodbye-cards/' . $goodbyeCard->id)->assertStatus(200);

    $response->assertStatus(200);
});

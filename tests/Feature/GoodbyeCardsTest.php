<?php

use App\Models\GoodbyeCard;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Can get all goodbye card from API', function () {
    GoodbyeCard::factory(2)->create();

    $response = $this->get('/')->assertStatus(200);

    $response->assertStatus(200);
});

test('Can create a goodbye card', function () {
    $response = $this->post('/goodbye-cards', [
        "author_name" => "Alexis",
        "message" => "bonjour",
        "card_color" => "#426754",
        "has_asset" => false
    ]);

    $response->assertStatus(200);
});
<?php

use App\Http\Controllers\GoodbyeCardController;
use Illuminate\Support\Facades\Route;

Route::apiResource('goodbye-cards', GoodbyeCardController::class)->only(['store', 'show', 'index']);

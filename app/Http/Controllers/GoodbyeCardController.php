<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoodbyeCardRequest;
use App\Http\Resources\GoodbyeCards;
use App\Http\Resources\GoodbyeCardsCollection;
use App\Models\GoodbyeCard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GoodbyeCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): GoodbyeCardsCollection
    {
        return new GoodbyeCardsCollection(GoodbyeCard::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGoodbyeCardRequest $request): JsonResponse
    {
        $payload = $request->validated();

        if ($request->hasFile('asset_file') && $request->file('asset_file')->isValid()) {
        // store the uploaded file and get the path
        $assetPath = $request->file('asset_file')->store(storage_path('app/public/goodbye-cards'));

        $assetPath = 'goodbye-cards/' . basename($assetPath);

        $payload['asset_path'] = $assetPath;

        }
        GoodbyeCard::create($payload);

        return response()->json(['message' => 'Goodbye card created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(GoodbyeCard $goodbyeCard): GoodbyeCards
    {
        return new GoodbyeCards($goodbyeCard);
    }
}

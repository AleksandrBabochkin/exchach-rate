<?php
declare(strict_types=1);

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiV1\BuyingCurrencyRequest;
use App\Http\Resources\ApiV1\BuyingCurrency\BuyingCurrencyResource;
use App\Models\ApiV1\{BuyingCurrency, Filters\BuyingCurrencyFilter};

class BuyingCurrencyController extends Controller
{
    public function index(BuyingCurrencyFilter $filter)
    {
        $buyingCurrency = BuyingCurrency::filter($filter)->get();

        return BuyingCurrencyResource::collection($buyingCurrency);
    }

    public function store(BuyingCurrencyRequest $request): BuyingCurrencyResource
    {
        $buyingCurrency = BuyingCurrency::create($request->all());

        return new BuyingCurrencyResource($buyingCurrency);
    }
}

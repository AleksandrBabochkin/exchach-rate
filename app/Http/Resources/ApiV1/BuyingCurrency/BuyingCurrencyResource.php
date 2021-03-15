<?php
declare(strict_types=1);

namespace App\Http\Resources\ApiV1\BuyingCurrency;

use App\Models\ApiV1\BuyingCurrency;
use Illuminate\Http\Resources\Json\JsonResource;

class BuyingCurrencyResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var $this BuyingCurrency */
        return [
            'id' => $this->id,
            'currency' => $this->currency,
            'buy' => $this->buy,
            'sell' => $this->sell,
            'office_id' => $this->office_id,
            'begins_at' => $this->begins_at,
        ];
    }
}

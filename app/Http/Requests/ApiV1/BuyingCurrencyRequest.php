<?php
declare(strict_types=1);

namespace App\Http\Requests\ApiV1;

use Illuminate\Foundation\Http\FormRequest;

class BuyingCurrencyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'currency' => ['required'],
            'buy' => ['required', 'numeric'],
            'sell' => ['required', 'numeric'],
            'begins_at' => ['date_format:"d.m.Y H:i:s"', 'required'],
            'office_id' => ['nullable', 'integer'],
        ];
    }
}

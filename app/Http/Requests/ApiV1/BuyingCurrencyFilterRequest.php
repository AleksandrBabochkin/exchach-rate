<?php
declare(strict_types=1);

namespace App\Http\Requests\ApiV1;

use Illuminate\Foundation\Http\FormRequest;

class BuyingCurrencyFilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'office_id' => ['required', 'integer'],
            'date_at' => ['date_format:"d.m.Y H:i:s"', 'required'],
        ];
    }
}

<?php
declare(strict_types=1);

namespace App\Models\ApiV1\Filters;

use App\Http\Requests\ApiV1\BuyingCurrencyFilterRequest;
use App\Models\QueryFilter;
use Carbon\Carbon;

class BuyingCurrencyFilter extends QueryFilter
{
    public function __construct(BuyingCurrencyFilterRequest $request)
    {
        parent::__construct($request);
    }

    public function office_id($value): void
    {
        $this->builder->where('office_id', $value);
    }

    public function date_at($value): void
    {
        $this->builder->where('begins_at', Carbon::parse($value));
    }
}

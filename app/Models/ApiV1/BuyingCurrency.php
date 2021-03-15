<?php
declare(strict_types=1);

namespace App\Models\ApiV1;

use App\Models\ApiV1\Filters\BuyingCurrencyFilter;
use Carbon\{Carbon, Traits\Timestamp};
use Illuminate\{Database\Eloquent\Builder, Database\Eloquent\Factories\HasFactory, Database\Eloquent\Model};

/**
 * App\Models\ApiV1\BuyingCurrency
 *
 * @property int $id
 * @property string $currency
 * @property float $buy
 * @property float $sell
 * @property string $begins_at
 * @property int|null $office_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency filter(\App\Models\ApiV1\Filters\BuyingCurrencyFilter $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency query()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency whereBeginsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency whereBuy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency whereOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency whereSell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyingCurrency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BuyingCurrency extends Model
{
    use HasFactory;
    use Timestamp;

    public const EUR = 10;

    static public array $currencies = [
        self::EUR  => 'EUR',
    ];

    protected $fillable = ['currency', 'buy', 'sell', 'begins_at', 'office_id'];

    public function scopeFilter(Builder $query, BuyingCurrencyFilter $filter): void
    {
        $filter->apply($query);
    }

    public function getCurrencyAttribute($currency): string
    {
        return static::$currencies[$currency];
    }

    public function getBeginsAtAttribute($beginsAt): string
    {
        return Carbon::parse($beginsAt)->format('d.m.Y H:i:s');
    }

    public function setCurrencyAttribute($currency): int
    {
        return $this->attributes['currency'] = array_flip(self::$currencies)[$currency];
    }

    public function setBeginsAtAttribute($beginsAt): Carbon
    {
        return $this->attributes['begins_at'] = Carbon::parse($beginsAt);
    }
}

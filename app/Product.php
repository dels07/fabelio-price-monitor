<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property mixed $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PriceHistory[] $priceHistories
 * @property-read int|null $price_histories_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $fillable = ['product_id', 'title', 'alt_title', 'description', 'additional_info', 'price', 'url', 'images'];

    protected $with = ['priceHistories'];

    public function getPriceDisplayAttribute()
    {
        $value = number_format($this->price, 0);

        return "Rp {$value}";
    }

    public function getImagesAttribute($value)
    {
        return json_decode($value);
    }

    public function getCreatedAtDisplayAttribute()
    {
        $value = str_replace(' ', '<br>', $this->created_at->addHours(7));

        return $value;
    }

    public function getUpdatedAtDisplayAttribute()
    {
        $value = str_replace(' ', '<br>', $this->updated_at->addHours(7));

        return $value;
    }

    public function priceHistories()
    {
        return $this->hasMany('App\PriceHistory');
    }
}

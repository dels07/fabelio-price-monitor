<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PriceHistory
 *
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PriceHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PriceHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PriceHistory query()
 * @mixin \Eloquent
 */
class PriceHistory extends Model
{
    protected $fillable = ['product_id', 'price'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}

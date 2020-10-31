<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'quantity', 'price_id', 'offer_id'];

    public function price()
    {

        return  $this->belongsTo(Price::class);
    }
}

<?php

namespace Bhavinjr\Wishlist\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'product_id'];


    public function product()
    {
        return $this->belongsTo(config('wishlist.product_model'),'product_id');
    }

    public function scopeOfUser($query,$user_id)
    {
        return $query->where('user_id',$user_id);
    }

    public function scopeByProduct($query,$product_id)
    {
        return $query->where('product_id',$product_id);
    }
}

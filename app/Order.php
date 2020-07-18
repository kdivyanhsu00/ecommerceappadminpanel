<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Order extends Eloquent
{
     protected $connection = 'mongodb';
     protected $collection = 'orders';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'created';
    
    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updated';

     public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
    public function campaign()
    {
        return $this->belognsTo(Campaign::class, 'campaignId');
    }
}

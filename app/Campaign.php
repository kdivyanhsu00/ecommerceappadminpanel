<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Campaign extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'campaigns';

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'productId',
        'campaignDesEN',
        'campaignDesAR',
        'campaignsPrize',
        'totalQuantity',
        'campaignType',
        'startDate',
        'endDate',
        'campaignUrl',
        'prizeUrl',
        'campaignTermEN',
        'campaignTermAR',
        'campaignSpecificationEN',
        'campaignSpecificationAR',
        'newSpecificationEN',
        'newSpecificationAR',
        'campaignLabelEN',
        'campaignLabelAR',
        'soldPercentage',
        'keys',
        'soldOut',
        'isSoldOut',
        'launchDate',
        'expireDate',
        'ticket',
        'points',
        'removeKeys',
        'objectProcessor',
        'isActive',
        '__v',
    ];  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = [
        'launchDate',
        'expireDate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'orderId');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'campaignsId');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
    public function winner()
    {
        return $this->hasOne(Winner::class, 'campaignId');
    }
}

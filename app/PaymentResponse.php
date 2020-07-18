<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PaymentResponse extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'paymentResponses';

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
    
    protected $fillable = [
        'response',
        'userId',
        '__v',
    ];
}

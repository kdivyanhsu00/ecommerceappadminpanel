<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Ticket extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'tickets';

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
        'isDoubleTicket', 
        'isCharity', 
        'ticketId',
        'ticketNum',
        'ticketCo',
        'poin',
        'isClose',
        'isPayments',
        'userId',
        'campaignsId',
        'orderId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaignsId');
    }
}

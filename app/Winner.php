<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Winner extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'winners';

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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $fillable = [
        'campaignId',
        'userId',
        'ticketNumber',
        'ticketId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaignId');
    }

    public function scopeSearchBy($query, $searchBy)
    {
        return $query->whereHas('user', function($q) use($searchBy) {
            $q->where('first_name', 'like', '%'.$searchBy.'%')
              ->orWhere('last_name', 'like', '%'.$searchBy.'%')
              ->orWhere('email', 'like', '%'.$searchBy.'%');
        });
    }
}

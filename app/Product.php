<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'products';

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
            'productNameEN',
            'productNameAR',
            'productDetailTitleEN', 
            'productDetailTitleAR',
            'productDetailDesEN',
            'productDetailDesAR',
            'productImageUrl',
            'productPrice',
            'typeOfProduct',
            'productTaxEN',
            'productTaxAR',
            'keys',
            'removeKeys',
            'objectProcessor',
            'isDelete',
            '__v',
    ];

   
}

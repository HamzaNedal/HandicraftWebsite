<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Product
 * @package App\Models
 * @version February 24, 2020, 4:24 pm UTC
 *
 * @property string name
 * @property integer price
 */
class Product extends Model
{

    public $table = 'products';




    public $fillable = [
        'pro_name',
        'pro_price',
        'category_id',
        'stock',
        'pro_info',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pro_name' => 'string',
        'pro_price' => 'integer',
        'category' => 'integer',
        'stock' => 'integer',
        'pro_info' => 'string',
        'image' => 'string',
        'user_id'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string',
        'price' => 'required|integer',
        'category' => 'required|integer',
        'stock' => 'required|integer',
        'photo' => 'nullable',
    ];

    public function getUser()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }



}

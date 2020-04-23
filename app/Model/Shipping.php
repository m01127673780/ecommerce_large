<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';
    protected $fillable = [
        'name_ar',
        'name_en',
        'mob',
        'code',
        'facebook',
        'twitter',
        'website',
        'insta',
        'email',
        'contact_name',
        'user_id',
        'lat',
        'lng',
        'logo',
        'address',

    ];
    public  function  user_id()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}


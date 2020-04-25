<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    protected $table = 'malls';
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
        'country_id',
        'lat',
        'lng',
        'logo',
        'address',

    ];
    public  function  country_id()
    {
        return $this->hasOne('App\Countreis','id','country_id');
    }
}


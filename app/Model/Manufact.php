<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Manufact extends Model
{
    protected $table = 'manufacts';
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
        'lat',
        'lng',
        'logo',
        'address',

    ];
}


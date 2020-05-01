<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $table = 'trade_marks';
    protected $fillable = [
        'name_ar',
        'name_en',
        'mob',
        'code',
        'logo',
    ];
//    public  function  trademarks(){
//        return $this->hasMany('App\Model\Trademark','trade_id' ,'id');
//    }
}
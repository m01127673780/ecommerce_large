<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class Flavor extends Model
{
    protected $table = 'flavors';
    protected $fillable = [
        'name_ar',
        'name_en',
        'icon',
        'color',
        'department_id',
        'is_public',
    ];
    public function department_id(){

        return $this->hasOne('App\Model\Department','id','department_id');
    }
}
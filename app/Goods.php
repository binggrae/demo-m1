<?php

namespace App;

use App\Commands\SortableTrait;
use Illuminate\Database\Eloquent\Model;
use Input;

class Goods extends Model
{
    use SortableTrait;


    public $table = 'goods';

    public $fillable = [
        'advert_id',
        'name',
        'price'
    ];

    static $sortable = [
        'id',
        'advert_id',
        'name',
        'price'
    ];
    

    public $timestamps = false;


    public function advert()
    {
        return $this->belongsTo('\App\Adverts');
    }

    public static function getList()
    {
        $goods = self::all();
        $result = [];
        foreach ($goods as $good) {
            $result[$good->id] = $good->name;
        }
        return $result;
    }


}

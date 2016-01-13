<?php

namespace App;

use App\Commands\SortableTrait;
use Illuminate\Database\Eloquent\Model;

class Adverts extends Model
{
    use SortableTrait;

    public $table = 'adverts';

    public $fillable = [
        'first_name',
        'last_name',
        'login',
        'password',
    ];

    public $timestamps = false;

    static $sortable = [
        'id',
        'first_name',
        'last_name',
        'login',
        'password',
    ];


    public static function getList()
    {
        $adverts = self::all();
        $result = [];
        foreach ($adverts as $advert) {
            $result[$advert->id] = $advert->first_name . ' ' . $advert->last_name;
        }
        return $result;
    }
}

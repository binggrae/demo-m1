<?php

namespace App;

use App\Commands\SortableTrait;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use SortableTrait;


    public $table = 'states';

    public $fillable = [
        'name',
        'slug',
    ];

    static $sortable = [
        'id',
        'name',
        'slug',
    ];

    public $timestamps = false;

    public static function getList()
    {
        $states = self::all();
        $result = [];
        foreach ($states as $state) {
            $result[$state->id] = $state->name;
        }
        return $result;
    }

}

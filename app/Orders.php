<?php

namespace App;

use Input;
use App\Commands\SortableTrait;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use SortableTrait;


    public $table = 'orders';

    public $fillable = [
        'state_id',
        'good_id',
        'add_time',
        'client_phone',
        'client_name',
    ];

    static $sortable = [
        'id',
        'state_id',
        'good_id',
        'add_time',
        'client_phone',
        'client_name',
    ];

    static $search = [
        'date' => [
            'start',
            'end',
        ],
        'columns' => [
            'id',
            'state_id',
            'client_phone',
            'good_id',
        ]
    ];

    public $timestamps = false;

    public function good()
    {
        return $this->belongsTo('\App\Goods');
    }

    public function state()
    {
        return $this->belongsTo('\App\States');
    }

    public function scopeSearch($query)
    {
        if(Input::get('search_date_start')) {
            $query->whereDate('add_time', '>=', Input::get('search_date_start'));
        }
        if(Input::get('search_date_end')) {
            $query->whereDate('add_time', '<=', Input::get('search_date_end'));
        }

        foreach (self::$search['columns'] as $column) {
            if(Input::get('search_' . $column)) {
                $query->where($column, '=', Input::get('search_' . $column));
            }
        }
    }

    public function formatPhone($phone)
    {
        $mask = '#';
        $phone = substr(preg_replace("/[^0-9]/", '', $phone), 1);

        $format = '+7 (###) ### - ####';

        $pattern = '/' . str_repeat('([0-9])?', substr_count($format, $mask)) . '(.*)/';

        $format = preg_replace_callback(
            str_replace('#', $mask, '/([#])/'),
            function () use (&$counter) {
                return '${' . (++$counter) . '}';
            },
            $format
        );

        return trim(preg_replace($pattern, $format, $phone, 1));
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (!$order->add_time) {
                $order->add_time = date('Y-m-d H:i:s');
            }
            $order->client_phone = $order->formatPhone($order->client_phone);
        });


        static::updating(function ($order) {
            $order->client_phone = $order->formatPhone($order->client_phone);
        });
    }

}

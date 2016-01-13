<?php

namespace App\Commands;

use Input;

trait SortableTrait
{

    public function scopeSortable($query)
    {
        foreach (self::$sortable as $field) {
            if (Input::has('sort_' . $field)) {
                $sort = '';
                if(Input::get('sort_' . $field) == -1) {
                    $sort = 'desc';
                } elseif(Input::get('sort_' . $field) == 1) {
                    $sort = 'asc';
                }
                if($sort) {
                    $query->orderBy($field, $sort);
                }
            }
        }
    }

    public static function getSortableClass($param)
    {
        if($param == 1) {
            return 'glyphicon glyphicon-sort-by-attributes' ;
        } elseif($param == -1) {
            return 'glyphicon glyphicon-sort-by-attributes-alt';
        } else {
            return '';
        }
    }
}
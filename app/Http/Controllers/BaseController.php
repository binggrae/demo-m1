<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.01.2016
 * Time: 14:45
 */

namespace App\Http\Controllers;


class BaseController extends Controller
{


    public function __construct()
    {
        $this->data = [];


    }

}
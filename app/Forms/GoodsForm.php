<?php

namespace App\Forms;

use App\Adverts;
use Kris\LaravelFormBuilder\Form;

class GoodsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('advert_id', 'select', [
                'choices' => Adverts::getList(),
                'empty_value' => '=== Select advert ==='
            ])
            ->add('name', 'text', [
                'rules' => 'required'
            ])
            ->add('price', 'text', [
                'rules' => 'required'
            ])
            ->add('save', 'submit', ['label' => 'Save good']);
    }
}

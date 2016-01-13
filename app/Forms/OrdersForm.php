<?php

namespace App\Forms;

use App\Goods;
use App\States;
use Kris\LaravelFormBuilder\Form;

class OrdersForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('state_id', 'select', [
                'choices' => States::getList(),
                'empty_value' => '=== Select state ==='
            ])
            ->add('good_id', 'select', [
                'choices' => Goods::getList(),
                'empty_value' => '=== Select good ==='
            ])
            ->add('client_phone', 'text', [
                'rules' => 'required'
            ])
            ->add('client_name', 'text', [
                'rules' => 'required'
            ])
            ->add('save', 'submit', ['label' => 'Save order']);
    }
}

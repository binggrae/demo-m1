<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AdvertsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'rules' => 'required'
            ])
            ->add('last_name', 'text', [
                'rules' => 'required'
            ])
            ->add('login', 'text', [
                'rules' => 'required'
            ])
            ->add('password', 'text', [
                'rules' => 'required|min:5'
            ])
            ->add('save', 'submit', ['label' => 'Save form']);
    }
}

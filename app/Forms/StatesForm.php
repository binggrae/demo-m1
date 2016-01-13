<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class StatesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'rules' => 'required'
            ])
            ->add('slug', 'text', [
                'rules' => 'required'
            ])
            ->add('save', 'submit', ['label' => 'Save state']);
    }
}

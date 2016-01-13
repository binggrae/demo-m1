<?php

namespace App\Http\Controllers;

use App\Forms\StatesForm;
use App\States;
use Illuminate\Http\Request;

use Input;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests;


class StateController extends BaseController
{

    public function index()
    {
        $data = [
            'items' => States::sortable()->paginate(Input::get('per_page', 2)),
        ];


        $view = \Request::ajax() ? 'state.index_ajax' : 'state.index';
        return view($view, $data);
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(StatesForm::class, [
            'method' => 'POST',
            'url' => route('state.store')
        ]);

        return view('state.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder, Request $request)
    {
        $form = $formBuilder->create(StatesForm::class);

        // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        States::create($request->all());
        return redirect()->route('state.index');
    }

    public function edit($id)
    {

    }

}

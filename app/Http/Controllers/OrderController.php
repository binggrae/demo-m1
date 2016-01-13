<?php

namespace App\Http\Controllers;

use App\Forms\OrdersForm;
use App\Orders;
use Illuminate\Http\Request;

use Input;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'items' => Orders::sortable()->search()->paginate(Input::get('per_page', 2)),
        ];


        $view = \Request::ajax() ? 'order.index_ajax' : 'order.index';
        return view($view, $data);
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(OrdersForm::class, [
            'method' => 'POST',
            'url' => route('order.store')
        ]);

        return view('order.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder, Request $request)
    {
        $form = $formBuilder->create(OrdersForm::class);

        // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Orders::create($request->all());
        return redirect()->route('order.index');
    }

    public function edit($id)
    {

    }
}

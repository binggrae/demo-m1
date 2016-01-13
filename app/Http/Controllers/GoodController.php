<?php

namespace App\Http\Controllers;

use App\Forms\GoodsForm;
use App\Goods;


use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use Kris\LaravelFormBuilder\FormBuilder;
use Zofe\Rapyd\DataForm\DataForm;
use Zofe\Rapyd\DataGrid\DataGrid;

class GoodController extends BaseController
{

    public function index()
    {
        $data = [
            'items' => Goods::sortable()->paginate(Input::get('per_page', 2)),
        ];


        $view = \Request::ajax() ? 'good.index_ajax' : 'good.index';
        return view($view, $data);
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(GoodsForm::class, [
            'method' => 'POST',
            'url' => route('good.store')
        ]);

        return view('good.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder, Request $request)
    {
        $form = $formBuilder->create(GoodsForm::class);

        // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Goods::create($request->all());
        return redirect()->route('good.index');
    }

    public function edit($id, FormBuilder $formBuilder)
    {
        $good = Goods::findOrFail($id);

        $form = $formBuilder->create(GoodsForm::class, [
            'method' => 'PUT',
            'model' => $good,
            'url' => route('good.update', ['id' => $good->id])
        ]);

        return view('good.create', compact('form'));
    }

    public function update($id, FormBuilder $formBuilder, Request $request)
    {
        $good = Goods::findOrFail($id);
        $form = $formBuilder->create(GoodsForm::class);

        // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $good->update($request->all());
        return redirect()->route('good.index');

    }


}

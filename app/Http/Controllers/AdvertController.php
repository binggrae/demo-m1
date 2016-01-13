<?php

namespace App\Http\Controllers;

use App\Adverts;
use App\Forms\AdvertsForm;
use Illuminate\Http\Request;

use App\Http\Requests;
use Kris\LaravelFormBuilder\FormBuilder;
use Zofe\Rapyd\DataGrid\DataGrid;


class AdvertController extends BaseController
{


    public function index()
    {
        $data = [
            'items' => Adverts::sortable()->paginate(\Input::get('per_page', 2)),
        ];

        $view = \Request::ajax() ? 'advert.index_ajax' : 'advert.index';
        return view($view, $data);
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(AdvertsForm::class, [
            'method' => 'POST',
            'url' => route('advert.store')
        ]);

        return view('advert.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder, Request $request)
    {
        $form = $formBuilder->create(AdvertsForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Adverts::create($request->all());
        return redirect()->route('advert.index');
    }

    public function edit()
    {


    }


    public function update()
    {


    }

    public function show($id)
    {



    }

    public function destroy()
    {

    }

}

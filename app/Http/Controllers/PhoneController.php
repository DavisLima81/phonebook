<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use App\Models\Contact;
use App\Models\PhoneArea;
use App\Models\PhoneType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Phone;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $contact_id = $request['contact'];
        //DEBUG
        //  dd($contact_id);
        //die;

        $contact = Contact::find($contact_id);
        //dd($contact);

        //ATRIBUI ação ao submeter o form para método STORE
        $action = route('telefones.store');

        //RECUPERA DDDs/PhoneAreas:
        $phone_areas = PhoneArea::all();
        //dd($phone_areas);

        //RECUPERA Tipos de telefones/PhoneTypes:
        $phone_types = PhoneType::all();
        //dd($phone_types);

        return view('phones.form', compact(
            'contact_id',
            'action',
            'phone_areas',
            'phone_types',
            'contact'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        // DEBUG
        //dd($request);
        //die;
        /* PERSISTIR DADOS NO BD */
        DB::beginTransaction();                         //TRANSACTION garante que as operações encadeadas sejam
        $phone = Phone::create($request->all());    //executadas em grupo.
        DB::commit();                                   //COMMIT marca o fim da transaction

        $request->session()->flash('success', "Telefone $phone->number armazenado.");        //GRAVA msg na seção
        return redirect()->route('contatos.show', $phone->contact_id);                     //encaminhando para view index
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

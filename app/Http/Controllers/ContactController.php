<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ContactType;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $contacts = Contact::with(['ContactType', 'Phones'])
        ->orderBy('name', 'asc');

        $search = $request->search;

        /* FILTRANDO lista do index por titulo/title */
        if ($request->search)
        {
            $contacts->where('name', 'like', "%$request->search%")
                ->orWhere('last_name', 'like', "%$request->search%")
                ->orWhere('remember', 'like', "%$request->search%")
                ->orWhere('email', 'like', "%$request->search%");
        }

        $contacts = $contacts->paginate(5)->withQueryString();
        return view('contacts.index', compact('contacts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ContactType $contact_types)
    {
        // DEBUG
        //echo 'CREATE de contatos';
        //die;

        //ATRIBUI ação ao submeter o form para método STORE
        $action = route('contatos.store');

        //RECUPERA tipos de contatos:
        $contact_types = ContactType::all();
        //dd($contact_types);

        return view('contacts.form',
            compact('action', 'contact_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        // DEBUG
        //dd($request);
        /* PERSISTIR DADOS NO BD */
        DB::beginTransaction();                         //TRANSACTION garante que as operações encadeadas sejam
        $contact = Contact::create($request->all());    //executadas em grupo.
        DB::commit();                                   //COMMIT marca o fim da transaction

        $request->session()->flash('success', "Contato $contact->name armazenado.");        //GRAVA msg na seção
        return redirect()->route('contatos.show', $contact->id);                     //encaminhando para view index
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //DEBUG
        //echo 'SHOW de contatos';
        //die;

        //recupera os dados do BD
        $contact = Contact::with(['contactType', 'Phones'])->find($id);

        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //DEBUG
        //echo 'EDIT de contatos';
        //die;

        //RECUPERA dados do Contato/contact a editar
        $contact_old = Contact::with(['contactType', 'Phones'])->find($id);

        //AÇÃO do formulário
        $action = route('contatos.update', $contact_old->id);

        //RECUPERA tipos de contatos:
        $contact_types = ContactType::all();
        //dd($contact_types);

        return view('contacts.form',
            compact('action', 'contact_types', 'contact_old'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        //DEBUG
        //echo 'UPDATE de contatos';
        //die;


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
        echo 'DESTROY de contatos';
        die;
    }
}

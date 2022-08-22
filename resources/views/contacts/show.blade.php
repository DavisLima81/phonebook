@extends('layouts.main')

@section('title')
    <title>Phonebook - Detalhes do contato</title>
@endsection

@section('content')

    <h5 style="margin-bottom: 0.5rem;">{{$contact->name}}</h5>
    <hr>

    <div class="row" style="padding-top: 0.5rem; margin: 0;">
        {{-- NOME E SOBRENOME --}}
        <span class="col s12 grey-text text-darken-2" style="padding: 0 0 1rem 0; margin: 0;">
            <p style="padding: 0; margin: 0;">
                Nome</p>
            <p style="padding: 0; margin: 0;" class="black-text">
                {{$contact->name}} {{$contact->last_name}}</p>
        </span>
        {{-- EMAIL --}}
        <span class="col s5 grey-text text-darken-2" style="padding: 0; margin: 0;">
            <p style="padding: 0; margin: 0;">
                Email</p>
            <p style="padding: 0; margin: 0;" class="black-text">
                {{$contact->email}}</p>
        </span>
        {{-- LEMBRETE --}}
        <span class="col s3 grey-text text-darken-2" style="padding: 0; margin: 0;">
            <p style="padding: 0; margin: 0;">
                Lembrete</p>
            <p style="padding: 0; margin: 0;" class="black-text">
                {{$contact->remember}}</p>
        </span>
    </div>
    <hr>
    <div>
        <span class="col s12 grey-text text-darken-2" style="padding: 1rem 0 0 0; margin: 0;">
            <p style="padding: 0; margin: 0;">
                Telefones</p>
            <div style="display: flex; flex-wrap: wrap;">
                    @if(count($contact->phones) > 0)
                        @forelse($contact->phones as $phone)
                        <span style="padding: 0; margin: 0 1rem 0 0;" class="black-text">
                                {{$phone->PhoneType->name}} <br>
                                ({{$phone->PhoneArea->number ?? ''}}) {{$phone->number ?? ''}}
                            </span>
                        @endforeach
                        @else
                            <span style="padding: 0; margin: 0 1rem 0 0;" class="black-text">
                        Sem registro de telefone para exibir no momento.
                            </span>
                    @endif
            </div>
        </span>
    </div>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-top: 0.5rem">
    <div class="left-align">
        {{-- BOTÃO abre form NOVO TELEFONE --}}
        <a href="{{route('telefones.create', compact('contact'))}}" class="btn-floating waves-effect waves-light" title="adicionar telefone">
            <i class="blue darken-4 large material-icons">contact_phone</i>
        </a>
    </div>
    <div class="right-align">
        {{-- BOTÃO encaminha p/ página da lista --}}
        <a href="{{ route('contatos.index') }}" class="btn-floating waves-effect waves-light" title="home">
            <i class="blue darken-4 large material-icons">home</i>
        </a>
        {{-- BOTÃO página anterior --}}
        <a href="{{ url()->previous() }}" class="btn-floating waves-effect waves-light" title="voltar">
            <i class="blue darken-4 large material-icons">arrow_back</i>
        </a>
    </div>
    </div>

@endsection

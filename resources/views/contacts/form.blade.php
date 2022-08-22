@extends('layouts.main')

@section('title')
    <title>Adicionar contato</title>
@endsection

@section('content')
    {{--
        <?php
        dd($contact_types);
        ?>
    --}}
    <h5>Adicionar contato</h5>
    <section class="section">
        <form action="{{$action}}" method="POST">
            {{-- SAFETY against cross-site request forgery --}}
            @csrf
            @isset($contact_old)
                @method('PUT')
            @endisset

            <div class="row" style="padding: 0; margin:0">
                {{-- NOME do contato --}}
                <div class="input-field col s6">
                    <input type="text" name="name" id="name" value="{{ old('name', $contact_old->name ?? '')}}"/>
                    <label for="name">Nome:</label>
                    @error('name')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                    @enderror
                </div>
                {{-- SOBRENOME do contato --}}
                <div class="input-field col s6">
                    <input type="text" name="last_name" id="last_name"
                           value="{{ old('last_name', $contact_old->last_name ?? '')}}"/>
                    <label for="last_name">Sobrenome:</label>
                    @error('last_name')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row" style="padding: 0; margin:0">
                {{-- LEMBRETE do contato --}}
                <div class="input-field col s12">
                    <input type="text" name="remember" id="remember"
                           value="{{ old('remember', $contact_old->remember ?? '')}}"/>
                    <label for="remember">Lembrete:</label>
                    @error('remember')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row" style="padding: 0; margin:0">
                {{-- EMAIL do contato --}}
                <div class="input-field col s6">
                    <input type="email" name="email" id="email" value="{{ old('email', $contact_old->email ?? '')}}"/>
                    <label for="email">Email:</label>
                    @error('email')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                    @enderror
                </div>

                {{-- TIPO do contato --}}
                <div class="input-field col s6">
                    <select name="contact_type_id" id="contact_type_id" class="select">
                        <option value="{{null}}" disabled selected>Selecione tipo...</option>
                        @foreach($contact_types as $contact_type)
                            <option value="{{$contact_type->id}}"
                                {{ old('contact_type_id', $contact_old->contact_type_id ?? '') == $contact_type->id ? 'selected' : '' }}>
                                {{$contact_type->name}}</option>
                        @endforeach
                        <label for="contact_type">Tipo de contato</label>
                    </select>
                    @error('contact_type_id')
                    <span class="red-text text-accent-3">
                            <small>{{$message}}</small>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- BOTÕES --}}
            <div class="row" style="padding: 0; margin:0">
                <div class="right-align">
                    {{-- BOTÃO voltar --}}
                    <a href=" {{ url()->previous() }}" class="btn-floating waves-effect waves-light" title="voltar">
                        <i class="blue darken-4 large material-icons">arrow_back</i>
                    </a>
                    {{-- BOTÃO gravar --}}
                    <button class="btn-floating waves-effect waves-light" type="submit" title="gravar">
                        <i class="blue darken-4 large material-icons">save</i>
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection

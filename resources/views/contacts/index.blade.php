@extends('layouts.main')

@section('title')
    <title>Phonebook, contatos</title>
@endsection

@section('content')
    <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-top: 0.5rem;">
        <h5 class="col s4">Contatos</h5>

        <div class="col s8 right-align">
            <form action="{{route('contatos.index')}}" method="GET">
                @csrf
                <div class="input-field row" style="display: flex; flex-wrap: nowrap;">
                    <input type="text" name="search" id="search" value="{{$search}}"/>
                    <label for="search">Pesquisar</label>

                    <a href="{{route('contatos.index')}}" class="btn white waves-effect z-depth-1 black-text"
                    style="padding-right: 2.5rem">Todos</a>
                    <button type="submit" class="btn blue darken-4 waves-light">
                        Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- LISTA de imóveis --}}
    <section class="section">
        <table class="highlight" style="width: 100%;">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Lembrete</th>
                <th class="right-align">Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->last_name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->remember}}</td>
                    <td class="right-align">

                        {{-- botão show --}}
                        <a style="padding-right: 0.5rem;" href="{{route('contatos.show', $contact->id)}}"
                           title="detalhes">
                            <i class="material-icons indigo-text darken-4">remove_red_eye</i>
                        </a>

                        {{-- botão editar --}}
                        <a href="{{route('contatos.edit', $contact->id)}}" title="editar">
                            <i class="material-icons indigo-text darken-4">edit</i>
                        </a>

                        {{-- botão deletar --}}
                        <form action="{{route('contatos.destroy', $contact->id)}}"
                              style="display: inline;" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border:0; background:transparent;" title="apagar">
                                <span style="cursor: pointer">
                                    <i class="material-icons red-text text-accent-4">delete_forever</i>
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <td colspan="10">Sem registros cadastrados ou dentro dos critérios de pesquisa</td>
            @endforelse
            </tbody>
        </table>
        <div>
            {{-- PAGINATION --}}
            {{ $contacts->links('layouts.pagination') }}
            {{--{{ $properties->links('layouts.pagination') }}--}}
        </div>
        {{-- BOTÃO ADICIONAR --}}
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" title="adicionar"
               href="{{route('contatos.create')}}">
                <i class="blue darken-4 large material-icons">person_add</i>
            </a>
        </div>
    </section>
@endsection

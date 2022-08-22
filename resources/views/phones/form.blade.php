@extends('layouts.main')

@section('title')
    <title>Adicionar contato</title>
@endsection

@section('content')
    {{--
    <?php
        dd($request);
    ?>
    --}}

    <h5>Adicionar telefone para <strong>{{$contact->name}} {{$contact->last_name}}</strong></h5>

    <section class="section">
        <form action="{{route('telefones.store')}}" method="POST">

            {{-- SAFETY against cross-site request forgery --}}
            @csrf
            @method('POST')
            {{--@isset($phone_old)
                @method('PUT')
            @endisset--}}

            <div class="row" style="padding: 0; margin:0">
                {{-- CÓDIGO de área DDD --}}
                <div class="input-field col s2">
                    <select name="phone_area_id" id="phone_area_id" class="select">
                        <option value="{{null}}" disabled selected>Selecione DDD</option>
                        @foreach($phone_areas as $phone_area)
                            <option value="{{$phone_area->id}}"
                                {{ old('phone_area_id', $phone_area_old->phone_area->id ?? '') == $phone_area->id ? 'selected' : '' }}>
                                {{$phone_area->number}}</option>
                        @endforeach
                        <label for="contact_type">Código de área</label>
                    </select>
                    @error('phone_area_id')
                    <span class="red-text text-accent-3">
                            <small>{{$message}}</small>
                        </span>
                    @enderror
                </div>

                {{-- NÚMERO do telefone --}}
                <div class="input-field col s6">
                    <input type="text" name="number" id="number" value="{{ old('number', $phone_old->number ?? '')}}"/>
                    <label for="number">Número:</label>
                    @error('number')
                    <span class="red-text text-accent-3">
                        <small>{{$message}}</small>
                    </span>
                    @enderror
                </div>
                {{-- TIPO de telefone --}}
                <div class="input-field col s4">
                    <select name="phone_type_id" id="phone_type_id" class="select">
                        <option value="{{null}}" disabled selected>Selecione tipo...</option>
                        @foreach($phone_types as $phone_type)
                            <option value="{{$phone_type->id}}"
                                {{ old('phone_type_id', $phone_type_old->phone_type->id ?? '') == $phone_type->id ? 'selected' : '' }}>
                                {{$phone_type->name}}</option>
                        @endforeach
                        <label for="contact_type">Tipo de telefone</label>
                    </select>
                    @error('phone_type_id')
                    <span class="red-text text-accent-3">
                            <small>{{$message}}</small>
                        </span>
                    @enderror
                </div>
                {{-- ID DO CONTATO recebido do PHONECONTROLLER --}}
                <div style="display: none;">
                    <input type="hidden" name="contact_id" id="contact_id" value="{{ $contact->id ?? ''}}"/>
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

@push('scripts')
    <script>
        $(function () {
            $("input[name='number']").on('input', function (e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });
        });
    </script>
@endpush

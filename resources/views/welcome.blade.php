<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PhoneBook</title>

    <!-- ICONS - google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
    {{-- JAVASCRIPT --}}
    <link rel="stylesheet" href="{{asset('js/materialize.js')}}">

    <!-- MATERIALIZE CSS - Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    {{-- JQUERY via CDN --}}
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

</head>
<body>

{{--
<div class="parallax-container">
    <div class="parallax"><img src="img/phonebook.jpeg"></div>
</div>
--}}

<nav class="blue darken-4" role="navigation">
    <div class="center-align">
        <a href="{{route('contatos.index')}}">
            Começar
        </a>

    </div>
</nav>
<div class="container">
    <h5>Phonebook</h5>
    <p>Módulo livro de contatos.</p>
</div>

{{-- SEÇÃO DE SCRIPTS --}}
{{-- JQUERY via CDN --}}
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

{{-- PARALAX IMG --}}
<script>
    $(document).ready(function(){
        $('.parallax').parallax();
    });
</script>
</body>
</html>

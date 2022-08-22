<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')

    <!-- ICONS - google/materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
    {{-- JAVASCRIPT --}}
    <link rel="stylesheet" href="{{asset('js/materialize.js')}}">
    {{-- JQUERY via CDN --}}
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous">
    </script>

</head>
<body>

{{-- MENU NAV --}}
<nav class="blue darken-4" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container"
           href="/"
           class="brand-logo">
            <i class="material-icons">contact_phone</i>
            <strong>Phone</strong>Book
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{ route('contatos.index') }}">Contatos</a></li>
        </ul>
    </div>
</nav>

<div class="container">
@yield('content')
</div>


        {{-- CHAMADAS DE RECURSOS SCRIPTS --}}
{{-- JQUERY via CDN --}}
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous">
</script>
<!-- MATERIALIZE JS - Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
{{-- FLASH MESSAGE success --}}
@if(session('success'))
    <script>
        /*TOAST Materialize-jQuery*/
        $(window).ready(function () {
            M.toast({html: "{{session('success')}}"});
        })
    </script>
@endif
<script>
    /*SELECT Materialize-jQuery*/
    $(document).ready(function(){
        $('select').formSelect();
    });

    /*MATERIALBOXED para visualização da imagem*/
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });
</script>
@stack('scripts')
</body>
</html>

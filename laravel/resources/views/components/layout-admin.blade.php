<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attela {{ $title ?? 'Main' }}</title>
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{asset('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link href="{{asset('vendors/summernote/summernote-lite.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/custom.css')}}?<?php echo md5(time())?>" rel="stylesheet" />
    @livewireStyles
    @stack('css')
</head>
<body>
    {{-- <x-admin-navigation/> --}}
    <div class="app-body">
        <div class="container-fluid">
            {{ $slot }}
        </div>
    </div>
    <form id="logoutform" action="{{ url('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/jquery/dist/popper.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{asset('vendors/select2/dist/js/select2.full.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('vendors/summernote/summernote-lite.min.js')}}"></script>
<script src="{{ asset('js/accounting.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@livewireScripts
@stack('js')
</body>
</html>

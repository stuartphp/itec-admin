@extends('layouts.admin')
@section('title', 'Product Detail')
@section('content')
    @livewire('admin.products.search')
    @include('admin.products.navigator')

@endsection
@section('scripts')
<script>
    $('.nav-link').click(function(){
        setTimeout(function(){
            $('#loadImg').hide();
        },500);
    });
    

</script>
@endsection

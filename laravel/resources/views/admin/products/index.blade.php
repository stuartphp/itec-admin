@extends('layouts.admin')
@section('title', 'Products')
@section('content')
<div>
    @livewire('admin.products.search')
    Show dashboard
</div>
@endsection
@section('scripts')
<script>


    $(document).ready(function(){
        openNav();
    });
</script>
@endsection

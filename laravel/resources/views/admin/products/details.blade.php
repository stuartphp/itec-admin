@extends('layouts.admin')
@section('title', 'Product Detail')
@section('content')
    @livewire('admin.products.search')
    @livewire('admin.products.index', ['id'=>$id])

@endsection
@section('scripts')
<script>
    $('.nav-link').click(function(){
        setTimeout(function(){
            $('#loadImg').hide();
        },500);
    });
    $(document).ready(function() {
        $('#description').summernote({
            tabsize: 2,
            height: 140,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['help']]
            ]
        });
    });

</script>
@endsection

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
    $('.select2').select2({
        dropdownParent: $('#formModal')
    });
    $(document).ready(function() {
        $('#description').summernote({
            dialogsInBody: true,
            tabsize: 2,
            height: 157,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
               // ['insert', ['link', 'picture']],
               // ['view', ['help']]
            ]
        });
    });

</script>
@endsection

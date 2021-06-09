@extends('layouts.admin')
@section('content')

    @livewire('admin.products.search')
    <a href="#" onclick="openNav()" style="position: absolute; top:45px; left:15px; z-index:1000"><i class="bi bi-list"></i></a>
    <nav class="navbar navbar-expand-lg navbar-light" id="items_nav" style="background-color: #EDF1ED">
        <div class="container-fluid">
           <div class="navbar-brand ps-3">{{ $data->product_code }} : {{ $data->name }}</div>
        <ul class="nav nav-pills" id="detailTab">
        <li class="nav-item">
          <a class="nav-link active" id="detail-tab" data-bs-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="prices-tab" data-bs-toggle="tab" href="#prices" role="tab" aria-controls="prices" aria-selected="false" >Prices</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="options-tab" data-bs-toggle="tab" href="#options" role="tab" aria-controls="options" aria-selected="false">Options</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="levels-tab" data-bs-toggle="tab" href="#levels" role="tab" aria-controls="levels" aria-selected="false">Levels</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="false">Images</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="activities-tab" data-bs-toggle="tab" href="#activities" role="tab" aria-controls="activities" aria-selected="false">Activities</a>
        </li>
      </ul>
    </nav>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
            Product
        </div>

        <div class="tab-pane fade" id="prices" role="tabpanel" aria-labelledby="prices-tab">
            @livewire('admin.products.prices', ['id'=>$data->id])
        </div>
        <div class="tab-pane fade" id="options" role="tabpanel" aria-labelledby="options-tab">
Options
       </div>
        <div class="tab-pane fade" id="levels" role="tabpanel" aria-labelledby="levels-tab">
Levels
        </div>
        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
Images
        </div>

        <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-tab">
Activities
        </div>


      </div>

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

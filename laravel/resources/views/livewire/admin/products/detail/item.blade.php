<div>
    @livewire('admin.products.search')
    <a href="#" onclick="openNav()" style="position: absolute; top:45px; left:15px; z-index:1000"><i class="bi bi-list"></i></a>
    <nav class="navbar navbar-expand-lg navbar-light" id="items_nav" style="background-color: #EDF1ED">
        <div class="container-fluid">
           <div class="navbar-brand"></div>
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
    <div id="result" wire.model="result"></div>
</div>

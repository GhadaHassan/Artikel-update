<div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">{{$pageTitle}}</h4>
          <p class="card-category">{{$pageDes}}</p>
        </div>
        {{ $slot }}
      </div>
    </div >

    <div class="col-md-3">
      <div class="card">
       {{ isset($md4) ? $md4 : ''}}
      </div>
    </div>
  
  </div>
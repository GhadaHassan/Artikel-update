<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-md-9">
                    <h4 class="card-title ">{{$pageTitle}}</h4>
                    {{-- <p class="card-category">{{$pageDes}}</p> --}}
                </div>
                {{ $addButton }}
            </div>
          
          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            {{ $table }}
{{--  --}}
            
          </div>
        </div>
      </div>
    </div>
    
  </div>
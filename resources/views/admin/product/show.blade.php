 @extends('layouts.backend.app')
@section('title','Product Show')

@push('css')

@endpush
@section('content')
  <!-- Content Wrapper. Contains page content -->
  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Product Detail</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                
              </div>
              <div class="row">
                <div class="col-12">
                    <div class="post">
                      <div class="user-block">
                       
                        <span class="username">
                          <a href="#">{{$product->name}}</a>
                        </span>
                        <span class="description"> 
 post create {{ $product->created_at->toFormattedDateString() }} and update - {{ $product->updated_at->toFormattedDateString() }}
                        </span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      
                         {!! $product->descr !!}
                      </p>    
                   </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary">Product Image</h3> <hr/>
               
              <img class="img-responsive thumbnail" src="{{ asset('storage/product/'.$product->image) }}">
              <br>
              <hr/>
              <div class="text-muted">
                
                <p class="text-sm">Category
                  <b class="d-block">
       {{ $product->category->name}}                
                  </b>
                </p>
              </div>
              <div class="text-muted">
                
                <p class="text-sm">Price
                  <b class="d-block">
       {{ $product->price}}                
                  </b>
                </p>
              </div>
             
              
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
  @push('js')
  @endpush
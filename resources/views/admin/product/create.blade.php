
 @extends('layouts.backend.app')
@section('title','Product')

@push('css')
<link rel="stylesheet" href="{{asset('assets/backend/plugins/summernote/summernote-bs4.css')}}">
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- main -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Product Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-3"></div>
              <div class="col-md-6">
              <form role="form" nctype="multipart/form-data" method="POST" action="{{route('admin.category.store')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput">Product Name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                        <label>Category</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInput">Product Price</label>
                    <input type="text" class="form-control" name="name"  placeholder="Enter Product Price">
                  </div>
    
                  <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <!-- textarea -->
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              
                <!-- /.card-body -->

                <div class="card">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="card">
               <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.product.index') }}">BACK</a>
                </div>
              </form>
            </div>
            </div>

  @endsection
  @push('js')
  <script src="{{asset('assets/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
  @endpush
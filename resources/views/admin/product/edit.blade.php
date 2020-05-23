
 @extends('layouts.backend.app')
@section('title','Product Edit')

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
              <li class="breadcrumb-item active">edit</li>
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
                <h3 class="card-title">Update Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-3"></div>
              <div class="col-md-6">
              <form role="form" nctype="multipart/form-data" method="POST" action="{{route('admin.product.update',$product->id)}}">
                @csrf
                 @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput">Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}" >
                  </div>
                  <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control">
                          @foreach($category as $categorys)
                 <option {{ $categorys->id == $product->category->id ? 'selected' : '' }}  value="{{$categorys->id}}">{{$categorys->categroy_name}}</option>
                         @endforeach
                          
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInput">Product Price</label>
                    <input type="number" class="form-control" value="{{$product->price}}" name="price" >
                  </div>
    
    <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Product Image</span>
  </div>
  <div class="custom-file">
    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
<img height="80" width="80" src="{{ asset('storage/product/'.$product->image) }}">
<br>
              

                  <!-- textarea -->
                <textarea class="textarea" name="descr" placeholder="Place product Description text here"
                          style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            
                             {!! $product->descr !!}
                          </textarea>
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

 @extends('layouts.backend.app')
@section('title','Coupons')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Coupons</h1>
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
                <h3 class="card-title">New Coupons Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-3"></div>
              <div class="col-md-6">
              <form role="form" nctype="multipart/form-data" method="POST" action="{{route('admin.coupon.update',$coupon->id)}}">
                 @csrf
                    @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput">Coupon Code</label>
                    <input type="number" class="form-control" name="categroy_name"  value="{{$category->categroy_name}}">
                  </div>
          
                <!-- /.card-body -->

                <div class="card">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="card">
               <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
                </div>
              </form>
            </div>
            </div>

  @endsection
  @push('js')
  @endpush
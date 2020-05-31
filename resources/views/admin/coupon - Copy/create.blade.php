
 @extends('layouts.backend.app')
@section('title','Coupon')

@push('css')

@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Coupon</h1>
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
    <style type="text/css">
      input[type=number] {
  -moz-appearance: textfield;
}
    </style>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Coupon Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-3"></div>
              <div class="col-md-6">
              <form role="form"  method="POST" action="{{route('admin.coupon.store')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput">Coupon Name</label>
                    <input type="text" class="form-control" name="code"  placeholder="Enter Coupon code">
                  </div>

                 <div class="form-group">
                        <label>Coupon Type</label>
                        <select name="type" class="form-control">
                        <option value="">-- Please select --</option>
                         <option value="1">Fixed</option>
                         <option value="2">Percent</option>
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInput">Coupon Value</label>
                    <input type="number" class="form-control" name="value"  placeholder="Enter Coupon type">
                  </div>
                  <div class="form-group">
                    <label for="exampleInput">Coupon Percent</label>
                    <input type="number" class="form-control" name="percent_off"  placeholder="Enter Coupon type">
                  </div>
          
                <!-- /.card-body -->

                <div class="card">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="card">
               <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.coupon.index') }}">BACK</a>
                </div>
              </form>
            </div>
            </div>

  @endsection
  @push('js')
  @endpush
 @extends('layouts.backend.app')
@section('title','Coupon')

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
            <h4 class="m-0 text-dark">Coupon Data Table</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Coupon</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                 <a href="{{ route('admin.coupon.create') }}">
                <button type="button" class="btn btn-block btn-info btn-sm"> <i class="fas fa-plus-circle"></i> Add New Coupon
               
       
            </button>

            </a>
            </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>serial</th>
                  <th>Code</th>
                  <th>Type</th>
                  <th>Value</th>
                  <th>percent_off</th>
                  <th>Create</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($coupons as $key=>$coupon)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$coupon->code}}</td>
                  <td>
                    {{$coupon->type}}
                  </td>
                  <td>{{$coupon->vule}}</td>
                  <td>{{$coupon->percent_off}}</td>
                  <td>{{$coupon->created_at->toFormattedDateString()}}</td>
                    <td>
                      <a href="{{ route('admin.coupon.edit',$coupon->id) }}" class="btn btn-info waves-effect">
                     <i class="material-icons">edit</i>
                   </a>
                    <a href="" class="btn btn-danger waves-effect" type="button" onclick="if(confirm('Are you Sure, You want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $coupon->id }}').submit();
                  }else{
                  event.preventDefault();
                  }">
                    <i class="material-icons">delete</i>
                  </a>
                  <form method="POST" id="delete-form-{{ $coupon->id }}" action="{{ route('admin.coupon.destroy',$coupon->id) }}" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    
                  </form>
                                            </td>

                  
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
  @push('js')
  <!-- DataTables -->
<script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
    @endpush
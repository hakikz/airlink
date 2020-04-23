@extends('backend.layouts.app')

@section('title', 'Bill List')

@push('styles')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<!-- Sweetalert 2 -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Bills</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Billing</a></li>
                  <li class="breadcrumb-item active">Bill</li>
                  <li class="breadcrumb-item active">Bills</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="card">
              <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#ID</th>
                      <th>SL No.</th>
                      <th>AWB Number</th>
                      <th>Delivery Place</th>
                      <th>VAT Percent</th>
                      <th>VAT Included</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bills as $key => $bill)  
                      @php
                          $bill_id_length = strlen((string)$bill->bill_id);
                          $zero_fill = (int)$bill_id_length + 1;
                      @endphp     
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ str_pad($bill->bill_id, $zero_fill, "0", STR_PAD_LEFT) }}</td>
                      <td>{{ $bill->awb_num }}</td>
                      <td>{{ $bill->delivery_place }}</td>
                      <td>
                        {{ $bill->vat }}%
                      </td>
                      <td>
                        @if(isset($bill->vat_price))
                          {{ $bill->vat_price }}
                        @else
                          0
                        @endif
                      </td>
                      <td>
                        {{ $bill->total }}
                      </td>
                      <td>
                        <a href="{{ route('backend.bill.show', $bill->bill_id) }}" class="btn btn-sm btn-success"><i class="fas fa-file-alt"></i></a>
                        <a href="{{ route('backend.bill.edit', $bill->bill_id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger" type="button" onclick="deletebill({{ $bill->bill_id }})"><i class="fas fa-trash"></i></button>
                        <form id="delete-form-{{ $bill->bill_id }}" action="{{ route('backend.bill.destroy', $bill->bill_id) }}" method="post" style="display: none;">
                          @csrf
                          @method('DELETE')
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#ID</th>
                      <th>SL No.</th>
                      <th>AWB Number</th>
                      <th>Delivery Place</th>
                      <th>VAT Percent</th>
                      <th>VAT Included</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
@endsection

@push('scripts')
<!-- DataTables -->
  <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
  <!-- Sweetalert2 -->
  <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- page script -->
  <script>
    $(function () {
      $("#datatable").DataTable();
    });
    function deletebill(id){
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          event.preventDefault();
          $('#delete-form-'+id).submit();
          Swal.fire(
            'Deleted!',
            'Your bill has been deleted.',
            'success'
          )
        }
      })
    }
  </script>
@endpush
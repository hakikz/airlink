@extends('backend.layouts.app')

@section('title', 'Create User')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          {{-- Messages will display here --}}
          @include('backend.layouts.flash')
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">AWB Edit Form</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">AWB</li>
                <li class="breadcrumb-item active">AWB Form</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="card card-default">
            <!-- form -->
            <form action="{{ route('backend.awb.update', $awb->id) }}" id="sales_info" method="POST">
              @csrf
              @method('PUT')
              <div class="card-header">
                <h3 class="card-title">Air Way Bill Edit Form</h3>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                      class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                      class="fas fa-remove"></i></button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8 offset-md-2">
                    <div class="row">
                      <div class="col-md-6"> 
                        <div class="form-group">
                          <label for="email">AWB Number</label>
                          <input type="text" class="form-control @error('awb_num') is-invalid @enderror" name="awb_num" placeholder="Example: AWB12365789" value="{{ $awb->awb_num }}">
                          @error('awb_num')
                            <div class="invalid-feedback">{{ $errors->first('awb_num') }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6"> 
                        <div class="form-group">
                          <label for="name">Storage Size</label>
                          <input type="text" class="form-control @error('storage_size') is-invalid @enderror" name="storage_size" placeholder="Example: 45" value="{{ $awb->storage_size }}">
                          @error('storage_size')
                            <div class="invalid-feedback">{{ $errors->first('storage_size') }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <button type="submit" class="btn btn-md btn-success"><i class="fas fa-save"></i> Save</button>
                        <a href="{{ route('backend.awb.create') }}" class="btn btn-md btn-warning"><i class="fas fa-plus"></i> New AWB</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
              </div>
            </form>
            <!-- /.form -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
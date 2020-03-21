@extends('backend.layouts.app')

@section('title', 'Create Product')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Product Form</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Product</li>
                  <li class="breadcrumb-item active">Product Form</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            {{-- Messages will display here --}}
            @include('backend.layouts.flash')
            <div class="card card-default">
              <!-- form -->
              <form action="{{ route('backend.product.store') }}" id="sales_info" method="POST">
                @csrf
                <div class="card-header">
                  <h3 class="card-title">Add Product</h3> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 offset-md-3">
                      <div class="form-group">
                        <label for="email">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Product Name (Example: Fan)" value="{{ old('name') }}">
                        @error('name')
                          <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @enderror
                      </div>
  
                      <div class="row">
                        <div class="col-md-6">
                          <button type="submit" class="btn btn-md btn-success"><i class="fas fa-save"></i> Save</button>
                          <a href="{{ route('backend.product.create') }}" class="btn btn-md btn-warning"><i class="fas fa-plus"></i> New Product</a>
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
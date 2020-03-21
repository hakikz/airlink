@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="fas fa-receipt"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Today's Bills</span>
                    <span class="info-box-number">1,410</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="fas fa-shopping-cart"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Total Products</span>
                    <span class="info-box-number">1,410</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-warning"><i class="fas fa-receipt"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Total Bills</span>
                    <span class="info-box-number">1,410</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-primary"><i class="fas fa-bezier-curve"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Total Braches</span>
                    <span class="info-box-number">10</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
@endsection
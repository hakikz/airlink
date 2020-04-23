@extends('backend.layouts.app')

@section('title', 'Show Bill')

@push('styles')

@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Billing</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for showing the data. Click the print button bellow to see the actual view of invoice.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> NSCargo
                    <small class="float-right">Date: {{ $bill->updated_at->format('j F, Y')  }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{ $bill_customer->from_name }}</strong><br>
                    {{ $bill_customer->from_address }}<br>
                    Phone: {{ $bill_customer->from_phone }}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ $bill_customer->to_name }}</strong><br>
                    {{ $bill_customer->to_address }}<br>
                    Phone: {{ $bill_customer->to_phone }}<br>
                  </address>
                </div>
                <!-- /.col -->
                @php
                    $bill_id_length = strlen((string)$bill->bill_id);
                    $zero_fill = (int)$bill_id_length + 1;
                @endphp 
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #{{ str_pad($bill->bill_id, $zero_fill, "0", STR_PAD_LEFT) }}</b><br>
                  <br>
                  <b>Weight:</b> {{ $bill->weight }} KG<br>
                  <b>Price Per KG:</b> SR {{ $bill->price_per_kg }}<br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong>Delivery Place</strong><br>
                    {{ $bill->delivery_place }}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong>AWB Number</strong><br>
                    {{ $bill->awb_num }}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Bill By:</b> {{ Auth::user()->name }}<br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table">
                    <thead>
                    <tr>
                      <th>#SL No.</th>
                      <th>Description</th>
                      <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bill_products as $key => $product)
                    <tr>  
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                    </tr>
                    @endforeach
                    @php
                        $with_out_vat = $bill->total - $bill->vat_price;    
                        $main = $bill->price_per_kg * $bill->weight;
                      @endphp
                      <tr>
                        <th colspan="2">Subtotal:</th>
                        <td>SR {{ $main }}</td>
                      </tr>
                      <tr>
                            <th colspan="2">VAT ({{ $bill->vat }}%)</th>
                            @if(isset($bill->vat_enable))
                            <td>SR {{ $bill->vat_price }}</td>
                            @else
                            <td>SR 0</td>
                            @endif
                      </tr>
                      @if(!empty($bill->service_charge))
                      <tr>
                        <th colspan="2">Service Charge:</th>
                        <td>SR {{ $bill->service_charge }}</td>
                      </tr>
                      @endif
                      @if(!empty($bill->door_delivery))
                      <tr>
                        <th colspan="2">Door Delivery:</th>
                        <td>SR {{ $bill->door_delivery }}</td>
                      </tr>
                      @endif
                      @if(!empty($bill->packaging_charge))
                      <tr>
                        <th colspan="2">Packaging Charge:</th>
                        <td>SR {{ $bill->packaging_charge }}</td>
                      </tr>
                      @endif
                      <tr>
                        <th colspan="2">Total:</th>
                        <td>SR {{ $bill->total }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
                <!-- /.col -->
                {{-- <div class="col-12">

                  <div class="table-responsive">
                    <table class="table">
                      @php
                        $with_out_vat = $bill->total - $bill->vat_price;    
                        $main = $bill->price_per_kg * $bill->weight;
                      @endphp
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>SR {{ $main }}</td>
                      </tr>
                      <tr>
                            <th>VAT ({{ $bill->vat }}%)</th>
                            @if(isset($bill->vat_enable))
                            <td>SR {{ $bill->vat_price }}</td>
                            @else
                            <td>SR 0</td>
                            @endif
                      </tr>
                      @if(!empty($bill->service_charge))
                      <tr>
                        <th>Service Charge:</th>
                        <td>SR {{ $bill->service_charge }}</td>
                      </tr>
                      @endif
                      @if(!empty($bill->door_delivery))
                      <tr>
                        <th>Door Delivery:</th>
                        <td>SR {{ $bill->door_delivery }}</td>
                      </tr>
                      @endif
                      @if(!empty($bill->packaging_charge))
                      <tr>
                        <th>Packaging Charge:</th>
                        <td>SR {{ $bill->packaging_charge }}</td>
                      </tr>
                      @endif
                      <tr>
                        <th>Total:</th>
                        <td>SR {{ $bill->total }}</td>
                      </tr>
                    </table>
                  </div>
                </div> --}}
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> --}}
                  <a href="{{ route('backend.bill.pdf', $bill->bill_id) }}" target="_blank" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@push('scripts')

@endpush
@extends('backend.layouts.app')

@section('title', 'Create Bill')

@push('styles')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Sweetalert 2 -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush

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
                <h1 class="m-0 text-dark">Billing Form</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Billing</li>
                  <li class="breadcrumb-item active">Bill Form</li>
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
              <form action="{{ route('backend.bill.update', $bill->bill_id) }}" id="sales_info" method="POST">
                @csrf
                @method('PUT')
                <div class="card-header">
                  <h3 class="card-title">Receipt Voucher</h3>
  
                  {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                        class="fas fa-remove"></i></button>
                  </div> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <select name="branch" id="branch" class="form-control">
                          <option value="">--Select Branch--</option>
                          @foreach ($branches as $branch)
                              <option value="{{ $branch->id }}"
                                @if ($bill->branch == $branch->id)
                                    selected
                                @endif
                              >{{ $branch->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <!-- Serial & Voucher -->
                    @php
                        $bill_id_length = strlen((string)$bill->bill_id);
                        $zero_fill = (int)$bill_id_length + 1;
                    @endphp 
                    <div class="col-md-3">
                      <div class="input-group mb-3">
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2">SL #</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Serial Number" aria-label="Serial Number"
                          aria-describedby="basic-addon2" value="{{ str_pad($bill->bill_id, $zero_fill, "0", STR_PAD_LEFT) }}" disabled>
                        <input type="hidden" name="bill_id" value="{{ $bill->bill_id }}">
                      </div>
                    </div>
                    <!-- Vat No. -->
                    <div class="col-md-3">
                      <div class="input-group mb-3">
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2">VAT No.</span>
                        </div>
                        <input type="text" class="form-control" placeholder="300570408600003" aria-label="vat_no"
                          aria-describedby="basic-addon2" value="{{ $setting->vat_no }}" disabled>
                          <input type="hidden" name="vat_no" value="{{ $setting->vat_no }}">
                      </div>
                    </div>
                    <!-- Date -->
                    <div class="col-md-3">
                      <div class="input-group mb-3">
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2">Date</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Date" aria-label="Date"
                          aria-describedby="basic-addon2" value="{{ $bill->updated_at->format('d-m-Y') }}" disabled>
                      </div>
                    </div>
                    <!-- From Fields -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="From">From</label>
                        <input name="from_name" type="text" class="form-control @error('from_name') is-invalid @enderror" placeholder="Name" value="{{ $bill_customer->from_name }}">
                        @error('from_name')
                          <div class="invalid-feedback">{{ $errors->first('from_name') }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <textarea name="from_address" class="form-control @error('from_address') is-invalid @enderror" placeholder="Address">{{ $bill_customer->from_address }}</textarea>
                        @error('from_address')
                          <div class="invalid-feedback">{{ $errors->first('from_address') }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input name="from_phone" type="text" class="form-control @error('from_phone') is-invalid @enderror" placeholder="Phone Number" value="{{ $bill_customer->from_phone }}">
                        @error('from_phone')
                          <div class="invalid-feedback">{{ $errors->first('from_phone') }}</div>
                        @enderror
                      </div>
                    </div>
                    <!-- To Fields -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="to">To</label>
                        <input name="to_name" type="text" class="form-control @error('to_name') is-invalid @enderror" placeholder="Name" value="{{ $bill_customer->to_name }}">
                        @error('to_name')
                          <div class="invalid-feedback">{{ $errors->first('to_name') }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <textarea name="to_address" class="form-control @error('to_address') is-invalid @enderror" placeholder="Address">{{ $bill_customer->to_address }}</textarea>
                        @error('to_address')
                          <div class="invalid-feedback">{{ $errors->first('to_address') }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input name="to_phone" type="text" class="form-control @error('to_phone') is-invalid @enderror" placeholder="Phone Number" value="{{ $bill_customer->to_phone }}">
                        @error('to_phone')
                          <div class="invalid-feedback">{{ $errors->first('to_phone') }}</div>
                        @enderror
                      </div>
                    </div>
                    <!-- AWB & Delivery Place -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="From">AWB</label>
                        <select name="awb_num" id="awb" class="form-control @error('awb_num') is-invalid @enderror">
                          <option value="">Select AWB--</option>
                          @foreach ($awbs as $awb)
                          <option value="{{ $awb->awb_num }}" @if(old('awb_num') == $awb->awb_num || $bill->awb_num == $awb->awb_num) selected @endif>{{ $awb->awb_num }}</option>
                          @endforeach
                        </select>
                        @error('awb_num')
                          <div class="invalid-feedback">{{ $errors->first('awb_num') }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="From">Delivery Place</label>
                        <textarea name="delivery_place" id="delivery_place" class="form-control @error('delivery_place') is-invalid @enderror">{{ $bill_customer->place }}</textarea>
                        @error('delivery_place')
                          <div class="invalid-feedback">{{ $errors->first('delivery_place') }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Description</label>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <label>Quantity</label>
                        </div>
                      </div>
                      <div id="more_field">
                        @foreach($bill_products as $key => $bill_product)
                        <div class="row multi-field" id="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control products @if($errors->get('product_id.*')) is-invalid @endif" name="product_id[]" id="product_id">
                                <option value="">Select Product--</option>
                                @foreach ($products as $product)
                                  <option value="{{ $product->id }}" @if($product->id == $bill_product->product_id) selected  @endif>{{ $product->name }}</option>
                                @endforeach
                              </select>
                              
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <input name="quantity[]" type="number" class="form-control @if($errors->get('quantity.*')) is-invalid @endif" value="{{ $bill_product->quantity }}">
                              
                            </div>
                          </div>
                          <div class="col-md-1">
                            <input type="hidden" name="p_id[]" value="{{ $bill_product->id }}">
                            <button type="button" class="remove-field btn btn-sm btn-danger btn-del" value="{{ $bill_product->id }}"><i
                                class="fas fa-minus"></i></button>
                          </div>
                        </div>
                        @endforeach
                      </div>
                      <button id="add_more" type="button" class="add-field btn btn-sm btn-success"><i
                          class="fas fa-plus-square"></i> Add More</button>
                    </div>
                    <div class="col-md-6">
                      <div class="card card-default">
                        <div class="card-body">
                          <!-- .row -->
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="qty_cartoon">Qty. of Cartoon</label>
                                <input name="qty_cartoon" type="number" class="form-control @error('qty_cartoon') is-invalid @enderror" min="0"
                                oninput="this.value = Math.abs(this.value)" @isset($bill->cartoon_quantity) value="{{ $bill->cartoon_quantity }}" @endisset>
                                
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="weight">Weight</label>
                                <!-- <input name="weight" type="text" class="form-control"> -->
                                <div class="input-group mb-3">
                                  <input type="text" name="weight" id="product_weight" class="form-control @error('weight') is-invalid @enderror"
                                    aria-label="Weight" aria-describedby="basic-addon2" @isset($bill->weight) value="{{ $bill->weight }}" @endisset>
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">KG</span>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="per_kg">Per Kg(SR.)</label>
                                <input type="text" class="form-control" value="{{ $setting->price_per_kg }}" disabled>
                                <input name="per_kg" id="per_kg" type="hidden" class="form-control" value="{{ $setting->price_per_kg }}">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="service_charge">Service Charge</label>
                                <input name="service_charge" id="service_charge" type="number" class="form-control"
                                  oninput="this.value = Math.abs(this.value)" @isset($bill->service_charge) value="{{ $bill->service_charge }}" @endisset>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="door_delivery">Door Delivery</label>
                                <input name="door_delivery" id="door_delivery" type="number" class="form-control"
                                  oninput="this.value = Math.abs(this.value)" @isset($bill->door_delivery) value="{{ $bill->door_delivery }}" @endisset>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="packaging_charge">Packaging Charge</label>
                                <input name="packaging_charge" id="packaging_charge" type="number" class="form-control"
                                  oninput="this.value = Math.abs(this.value)" @isset($bill->packaging_charge) value="{{ $bill->packaging_charge }}" @endisset>
                              </div>
                            </div>
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <div class="card card-default">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6 offset-md-6">
                              <div class="form-group">
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="vat_check" name="vat_check" @if(isset($bill->vat_enable)) checked="checked" value="1" @endif>
                                  <label for="vat_check">VAT Enable</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- .row -->
                          <div class="row vat_block">
                            <div class="col-md-2 offset-md-6">
                              <div class="form-group">
                                <label for="Total">VAT:</label>
                              </div>
                            </div>
                            <div class="col-md-4">
                              @if(isset($bill->vat_enable))
                              <input type="text" class="form-control" id="vat_val" @if($bill->vat_enable == 1) value="{{ $bill->vat_price }}"  @endif disabled="disabled">
                              @else
                              <input type="text" class="form-control" id="vat_val" value="0" disabled="disabled">
                              @endif
                              <small><i style="color: red;">VAT Icluded {{ $setting->vat_value }}%</i></small>
                            </div>
                          </div>
                          <!-- /.row -->
                          <div class="row">
                            <div class="col-md-2 offset-md-6">
                              <div class="form-group">
                                <label for="Total">Total:</label>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <input type="text" class="form-control" id="result" value="{{ $bill->total }}" disabled="disabled">
                              <input name="total" id="result_hidden" type="hidden" value="{{ $bill->total }}">
                            </div>
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-md-4 offset-md-4">
                      <!-- VAT is here -->
                      <input type="hidden" name="vat" id="vat" @if($bill->vat != '') value="{{ $bill->vat }}" @else value="0"  @endif>
                      <button type="submit" class="btn btn-success" id="submit_all"><i class="fas fa-save"></i> Update
                        bill</button>
                      <a href="{{ route('backend.bill.create') }}" class="btn btn-warning"><i class="fas fa-plus"></i> New Bill</a>
                    </div>
                  </div>
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

@push('scripts')
<!-- Select2 -->
  <script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Sweetalert2 -->
  <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- InputMask -->
  {{-- <script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script> --}}
<!-- Custom JS -->
  <script type="text/javascript">
    checkFields();
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2();
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
    });

    $(document).ready(function () {

      var count = 0;

      // If VAT checked
      $('#vat_check').on('change',function(){

        var result = $("#result").val();
        var vat_val = $("#vat_val").val();
        var check = $(this).val();
        if ($(this).is(':checked')) {
            
            $(this).val(1);
            $('#vat').val({{ $setting->vat_value }});
            $('.vat_block').show('slow');
            if(vat_val == 0){
              $('#vat').val({{ $setting->vat_value }});
              var vat = $("#vat").val();
              var with_vat = parseFloat(vat)/100;
              var calc_vat = parseFloat(result) * parseFloat(with_vat);
              var inc_vat = parseFloat(result) + parseFloat(calc_vat);
              $("#vat_val").val(calc_vat);
              $("#result").val(inc_vat);
              $("#result_hidden").val(inc_vat);
            }
            else{
              var with_vat_total = parseFloat(result) + parseFloat(vat_val);
              $("#result").val(with_vat_total);
              $("#result_hidden").val(with_vat_total);
            }
        }else{
          $('#vat').val(0);
          $('.vat_block').hide('slow');
          var result = $("#result").val();
          var without_vat_total = parseFloat(result) - parseFloat(vat_val);
          $("#result").val(without_vat_total);
          $("#result_hidden").val(without_vat_total);
          $(this).val(0);
        }
      });

      // if ($('#vat_check').is(':checked')) {
      //     $('.vat_block').show('slow');
      // }else{
      //     $('.vat_block').hide('slow');
      // }
      // Add additonal Product Descriptoin
      $("#add_more").click(function () {
        count++;
        // Destroing Select2 for effect cloned select boxes
        // $('.multi-field .form-group select').select2('destroy');
        var html = '<div class="row multi-field" id="row' + count + '">' +
          '<div class="col-md-6">' +
          '<div class="form-group">' +
          '<select class="form-control products" name="product_id[]">' +
          '<option value="">Select Product--</option>' +
          '@foreach($products as $product) <option value="{{ $product->id }}">{{ $product->name }}</option> @endforeach' +
          '</select>' +
          '</div>' +
          '</div>' +
          '<div class="col-md-5">' +
          '<div class="form-group">' +
          '<input name="quantity[]" type="number" class="form-control">' +
          '</div>' +
          '</div>' +
          '<div class="col-md-1">' +
          '<input type="hidden" name="p_id[]" value="n' + count + '">' +
          '<button type="button" class="remove-field btn btn-sm btn-danger btn-del"><i class="fas fa-minus"></i></button>' +
          '</div>' +
          '</div>';
        $("#more_field").append(html);
        // $('.multi-field .form-group select').select2();
        // checkSelects();
      });

      // Remove Addition Prdouct Description
      $(document).on('click', '.remove-field', function (e) {

        var del_id = $(this).val();
        // alert(del_id);
        if ($(".multi-field").length > 1){
          if(del_id != ""){
            // alert(del_id);
            e.preventDefault();
            $.ajax({
                type: 'DELETE',
                url:'/admin/bill/product/'+del_id,
                cache: false,
                data:{"_token": "{{ csrf_token() }}", "id": del_id},
                success: function(data){
                  // alert(data);
                    if(data=="YES"){
                      // $(this).closest(".multi-field").remove();
                      Swal.fire(
                        'Remind!',
                        'Product removed successfully!',
                        'success'
                      )
                      $("#more_field").load("# #more_field");
                    }else{
                        alert("can't delete the row")
                    }
                }

            });
          }else{
            $(this).closest(".multi-field").remove();
          }
        }
        checkSelects();

      });

      var final_result = 0;

      // On change weight

      $("#product_weight, #service_charge, #door_delivery, #packaging_charge").on('input', function () {
        var weight = $("#product_weight").val();
        var per_kg = $("#per_kg").val();
        var service_charge = $("#service_charge").val();
        var door_delivery = $("#door_delivery").val();
        var packaging_charge = $("#packaging_charge").val();
        var vat = $("#vat").val();
        var multiply = parseFloat(weight) * parseFloat(per_kg);
        var with_vat = parseFloat(vat)/100;
        // alert(vat);
        checkFields();
        // Only Weight Filled
        if (weight != "" && service_charge == "" && door_delivery == "" && packaging_charge == "") {
          vat_result = parseFloat(multiply) * parseFloat(with_vat);
          final_result = parseFloat(multiply) + parseFloat(vat_result);
        }
        // Only Service Charge Filled
        else if (service_charge != "" && weight == "" && door_delivery == "" && packaging_charge == "") {
          vat_result = parseFloat(service_charge) * parseFloat(with_vat);
          final_result = parseFloat(service_charge) + parseFloat(vat_result);
        }
        // Only Door Delivery Filled
        else if (door_delivery != "" && weight == "" && service_charge == "" && packaging_charge == "") {
          vat_result = parseFloat(door_delivery) * parseFloat(with_vat);
          final_result = parseFloat(door_delivery);
        }
        // Only Packaging Charge Filled
        else if (door_delivery == "" && weight == "" && service_charge == "" && packaging_charge != "") {
          vat_result = parseFloat(packaging_charge) * parseFloat(with_vat);
          final_result = parseFloat(packaging_charge);
        }
        // Only Weight Blank
        else if (weight == "" && service_charge != "" && door_delivery != "" && packaging_charge != "") {
          total_result = parseFloat(service_charge) + parseFloat(door_delivery) + parseFloat(packaging_charge);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        // Only Door Delivery Blank
        else if (weight != "" && service_charge != "" && door_delivery == "" && packaging_charge != "") {
          total_result = parseFloat(multiply) + parseFloat(service_charge) + parseFloat(packaging_charge);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        // Only Service Charge Blank
        else if (weight != "" && service_charge == "" && door_delivery != "" && packaging_charge != "") {
          total_result = parseFloat(multiply) + parseFloat(door_delivery) + parseFloat(packaging_charge);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        // Only Packaging Charge Blank
        else if (weight != "" && service_charge != "" && door_delivery != "" && packaging_charge == "") {
          total_result = parseFloat(multiply) + parseFloat(service_charge) + parseFloat(door_delivery);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        // Weight and Service Charge blank
        else if (weight == "" && service_charge == "" && door_delivery != "" && packaging_charge != "") {
          total_result = parseFloat(door_delivery) + parseFloat(packaging_charge);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        // Weight and Door Delivery blank
        else if (weight == "" && service_charge != "" && door_delivery == "" && packaging_charge != "") {
          total_result = parseFloat(service_charge) + parseFloat(packaging_charge);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        // Weight and Packaging Charge blank
        else if (weight == "" && service_charge != "" && door_delivery != "" && packaging_charge == "") {
          total_result = parseFloat(service_charge) + parseFloat(door_delivery);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        // Service Charge and Door Delivery blank
        else if (weight != "" && service_charge == "" && door_delivery == "" && packaging_charge != "") {
          total_result = parseFloat(multiply) + parseFloat(packaging_charge);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        // Service Charge and Packaging Charge blank
        else if (weight != "" && service_charge == "" && door_delivery != "" && packaging_charge == "") {
          total_result = parseFloat(multiply) + parseFloat(door_delivery);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        // Door Delivery and Packaging Charge blank
        else if (weight != "" && service_charge != "" && door_delivery == "" && packaging_charge == "") {
          total_result = parseFloat(multiply) + parseFloat(service_charge);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        // All blank
        else if (weight == "" && service_charge == "" && door_delivery == "" && packaging_charge == "") {
          final_result = 0;
        }
        else {
          total_result = parseFloat(multiply) + parseFloat(service_charge) + parseFloat(door_delivery) + parseFloat(packaging_charge);
          vat_result = parseFloat(total_result) * parseFloat(with_vat);
          final_result = parseFloat(total_result) + parseFloat(vat_result);
        }
        $("#result").val(final_result);
        $("#result_hidden").val(final_result);
        $("#vat_val").val(vat_result);

      });

      // Submitting the form
      // $("#submit_all").click(function (e) {
      //     e.preventDefault();
      //     var form = $('#sales_info');
      //     var element_customer = form.serialize();
      //     alert("you are submitting" + form.serialize());
      // });

      // Disable Already selected
      $("#more_field").delegate(".products", "change", function(){
          // $('option[value=' + $(this).val() + ']').attr('disabled', 'disabled');
          checkSelects(); /*This is function which is for alert of repeating item*/
      });
      

    });


    /***********This function is for catch error when same item will be selected**************/
    function checkSelects() {
        var $elements = $('.products');
        $('#submit_all').removeAttr('disabled')
        $elements
            .removeClass('is-invalid')
            .each(function () {
                var selectedValue = this.value;

                $elements
                    .not(this)
                    .filter(function() {
                        console.log([this.value, selectedValue]);
                        return this.value == selectedValue;
                    })
                    .addClass('is-invalid');
                    // $('#submit_all').attr( "disabled", "disabled" )

                    if($(".products").hasClass("is-invalid")){
                      $('#submit_all').attr( "disabled", "disabled" )
                    }
                    else{
                      $('#submit_all').removeAttr('disabled')
                    }
            });
        }

        /***********This function is for catch error when Weight will be minus value**************/
        function checkFields() {
          if( $('#product_weight').val() < 0 ){
            $('#product_weight').addClass('is-invalid');
            $('#submit_all').attr( "disabled", "disabled" )
          }
          else{
            $('#product_weight').removeClass('is-invalid');
            $('#submit_all').removeAttr('disabled')
          }
        }
  </script>
@endpush
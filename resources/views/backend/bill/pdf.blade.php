<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PDF Download</title>

    <style type="text/css">
        /* GRID LAYOUT START */
        *{
            margin: 0;
            padding: 0;
        }

        *{box-sizing: border-box;}

        /*Class selector*/
        [class*="col-"]{
            float: left;
            width: 100%;
        }

        .col-1{width: 8.33%}
        .col-2{width: 16.66%}
        .col-3{width: 25%}
        .col-4{width: 33.33%}
        .col-5{width: 41.66%}
        .col-6{width: 50%}
        .col-7{width: 58.33%}
        .col-8{width: 66.66%}
        .col-9{width: 75%}
        .col-10{width: 83.33%}
        .col-11{width: 91.66%}
        .col-12{width: 100%}

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
        
        .text-grey {
            color: #333333;
        }

        .img-responsive{
            display: block;
            max-width: 100%;
            height: auto;
        }


        /*Pseudo element*/
        .row:after{
            content: "";
            clear: both;
            display: block;
        }

        .wrapper{
            width: 80%;
            height: auto;
            margin: auto;
        }

        p{
            font-family: Arial, sans-serif;
            font-size: 11px;
        }

        .heading {
            font-family: Arial, sans-serif;
            font-size: 12px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 5px;
            background-color: #F0F0F0;
        }

        .table {
            border-collapse: collapse;
            border-spacing: 0;
            border-color: #ccc;
        }

        .table td {
            font-family: Arial, sans-serif;
            font-size: 11px;
            padding: 5px 5px;
            border-style: solid;
            overflow: hidden;
            word-break: normal;
            border-color: #ccc;
            color: #333;
            border-width: 1px;
        }

        .table th {
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-weight: normal;
            padding: 5px 5px;
            border-style: solid;
            overflow: hidden;
            word-break: normal;
            border-color: #ccc;
            color: #333;
            background-color: #f0f0f0;
            border-width: 1px;
        }

        .table .table-yw4l {
            vertical-align: top
        }

        thead {
            display: table-header-group;
        }

        tr {
            page-break-inside: avoid;
        }

        .footer-text {
            font-size: 8px;
        }
        @page{
            size: 15cm 18cm portrait; 
        }
    </style>
</head>

<body>
<div class="row">
    <div class="row">
        <div class="col-4">
            <img class="img-responsive" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFUAAAA0CAYAAAD7XXSlAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OTBDNkM3MjcwN0FCMTFFNjk4MjZGRTQ3RTM4MUY4NzUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OTBDNkM3MjgwN0FCMTFFNjk4MjZGRTQ3RTM4MUY4NzUiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo5MEM2QzcyNTA3QUIxMUU2OTgyNkZFNDdFMzgxRjg3NSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo5MEM2QzcyNjA3QUIxMUU2OTgyNkZFNDdFMzgxRjg3NSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PjYBPiwAAAn6SURBVHja7Fx5VFTX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
" alt="Logo">
        </div>
        <div class="col-8 text-right">
            <div class="row">
                <p style="font-size: 10px;">67/B ADDL Tower, Dhanmondi, Dhaka-1209, Bangladesh</p>
            </div>
        </div>
    </div>

    <div class="row">
        <h2 class="heading">Bill Details</h2>
    </div>

    <br>
    <div class="row">
        <div class="col-4">
          <p><b>From:</b></p>
          <p>{{ $bill_customer->from_name }}</p>
          <p>{{ $bill_customer->from_address }}</p>
          <p>{{ $bill_customer->from_phone }}</p>
        </div>
        <div class="col-4 text-center">
          <p><b>To:</b></p>
          <p>{{ $bill_customer->to_name }}</p>
          <p>{{ $bill_customer->to_address }}</p>
          <p>{{ $bill_customer->to_phone }}</p>
      </div>
      <div class="col-4 text-right">
          <p><b>Date:</b> <br>{{ $bill->updated_at->format('j F, Y')  }}</p>
      </div>
    </div>

    <br>
    @php
        $bill_id_length = strlen((string)$bill->bill_id);
        $zero_fill = (int)$bill_id_length + 1;
    @endphp 
    <div class="row">
        <div class="col-4">
          <p><b>Bill Creator:</b> {{ Auth::user()->name }}</p>
        </div>
        <div class="col-4 text-center">
          <p><b>Invoice: #{{ str_pad($bill->bill_id, $zero_fill, "0", STR_PAD_LEFT) }}</b></p>
      </div>
      <div class="col-4 text-right">
          <p><b>AWB Number: {{ $bill->awb_num }}</b></p>
      </div>
    </div>

    <br>

    <div class="row">
        <div class="col-4">
          <p><b>Delivery Place:</b> {{ $bill->delivery_place }}</p>
        </div>
        <div class="col-4 text-center">
          <p><b>Weight:</b> {{ $bill->weight }} kG</p>
      </div>
      <div class="col-4 text-right">
          <p><b>Price Per KG:</b> SR {{ $bill->price_per_kg }}</p>
      </div>
    </div>

    <br>

    <div class="row">
        <table class="table" width="100%">
            <thead>
            <tr>
                <th><b>SL No</b></th>
                <th><b>Description</b></th>
                <th><b>Quantity</b></th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach ($bill_products as $key => $product)
                <tr>
                    <td>{{ $key+ 1 }}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                </tr>
            @endforeach
            @php
              $with_out_vat = $bill->total - $bill->vat_price;    
              $main = $bill->price_per_kg * $bill->weight;
            @endphp
            <tr>
              <td colspan="2"><b>Subtotal:</b></td>
              <td><b>{{ $main }}</b></td>
            </tr>
            <tr>
                  <td colspan="2"><b>VAT ({{ $bill->vat }}%)</b></td>
                  @if(isset($bill->vat_enable))
                  <td><b>{{ $bill->vat_price }}</b></td>
                  @else
                  <td><b>0</b></td>
                  @endif
            </tr>
            @if(!empty($bill->service_charge))
            <tr>
              <td colspan="2"><b>Service Charge:</b></td>
              <td><b>{{ $bill->service_charge }}</b></td>
            </tr>
            @endif
            @if(!empty($bill->door_delivery))
            <tr>
              <td colspan="2"><b>Door Delivery:</b></td>
              <td><b>{{ $bill->door_delivery }}</b></td>
            </tr>
            @endif
            @if(!empty($bill->packaging_charge))
            <tr>
              <td colspan="2"><b>Packaging Charge:</b></td>
              <td><b>{{ $bill->packaging_charge }}</b></td>
            </tr>
            @endif
            <tr>
                <th colspan="2"><b>Bill Total</b></th>
                <th><b>SR {{ $bill->total }}</b></th>
            </tr>
            </tbody>

        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row text-center">
        <div class="col-12 footer-text"><p>This is an automatically generated bill</p></div>
    </div>
</div>
</body>
</html>


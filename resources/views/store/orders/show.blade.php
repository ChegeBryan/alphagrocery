@extends('store.master')

@section('title')
{{ Auth::guard('store')->user()->name }}
@endsection

@section('body')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Invoice</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between py-3">
        <h5 class="card-title font-weight-bold">{{$order->store_name}}</h5>
        <h6 class="card-subtitle text-muted">Placed On: {{$order->created_at}}</h6>
      </div>
      <p class="card-text"><span class="font-weight-bold">Customer Name:</span>&nbsp;{{$order->shipping->name}}</p>
      <p class="card-text"><span class="font-weight-bold">Phone Number:</span>&nbsp;{{$order->shipping->phone_number}}
      </p>
      <p class="card-text"><span class="font-weight-bold">Delivery Address:</span>&nbsp;{{$order->shipping->address}}
      </p>

      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Total (Kshs.)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$order->product_name}}</td>
              <td>{{$order->product_quantity}}</td>
              <td>{{$order->order_subtotal}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

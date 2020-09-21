@extends('store.master')

@section('title')
{{ Auth::guard('store')->user()->name }}
@endsection

@section('body')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Customer Orders</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between py-3">
        <h5 class="card-title font-weight-bold">{{Auth::guard('store')->user()->name}}</h5>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Name</th>
              <th>Delivery To</th>
              <th>Phone Number</th>
              <th>Quantity</th>
              <th>SubTotal (Kshs.)</th>
            </tr>
          </thead>
          <tbody>
            @php($total = 0)
            @foreach($orders as $order)
            <tr>
              <td>{{$order->product_name}}</td>
              <td>{{$order->shipping->name}}</td>
              <td>{{$order->shipping->address}}</td>
              <td>{{$order->shipping->phone_number}}</td>
              <td align="right">{{$order->product_quantity}}</td>
              <td align="right">{{$order->order_subtotal}}</td>
            </tr>
            @php ($total += $order->order_subtotal)
            @endforeach
            <tr>
              <td colspan="6" align="right"><span class="font-weight-bolder">Kshs. {{$total}}</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

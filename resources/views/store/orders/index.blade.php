@extends('store.master')

@section('title')
{{ Auth::guard('store')->user()->name }}
@endsection

@section('body')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Orders</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Orders list</h6>
    </div>
    <div class="card-body">
      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dt" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Order</th>
              <th>Customer</th>
              <th>Order Total (Kshs.)</th>
              <th>Order Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php ($n = 0)
            @foreach($orders as $order)
            <tr>
              <td>{{$n++}}</td>
              <td>{{$order->user->name}}</td>
              <td>{{$order->order_subtotal}}</td>
              <td>{{$order->order_status}}</td>
              <td>
                {{$n}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@section('custom-script')
<script src="{{ asset('js/dt.js') }}"></script>
@endsection

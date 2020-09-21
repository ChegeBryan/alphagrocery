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
              <th>Invoice</th>
              <th>Orders By Customer</th>
              <th>Complete Order</th>
              <th>Remove Order</th>
            </tr>
          </thead>
          <tbody>
            @php ($n = 0)
            @foreach($orders as $order)
            <tr>
              <td>{{++$n}}</td>
              <td>{{$order->customer->name}}</td>
              <td>{{$order->order_subtotal}}</td>
              <td>{{$order->order_status}}</td>
              <td>
                <a href="{{ route('orders.show', $order->id)}}" class="btn btn-info"><i class="fas fa-info"></i>
                  Invoice</a>
              </td>
              <td>
                <a href="{{ route('orders.customer', $order->customer_id)}}" class="btn btn-warning"><i
                     class="fas fa-clipboard-list"></i> Orders</a>
              </td>
              <td>
                <form action="{{ route('orders.update', $order->id)}}" method="post">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" value="Completed" id="status" name="status">
                  <button class="btn btn-success" type="submit"><i class="fas fa-check-circle"></i> Mark as
                    Complete</button>
                </form>
              </td>

              <td>
                <form action="{{ route('orders.destroy', $order->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
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

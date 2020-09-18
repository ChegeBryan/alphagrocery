@extends('layouts.app')

@section('title') Mama Mboga @endsection

@section('content')
<div class="container pb-4">
  <h3 class="text-center pb-3">Place your order</h3>
  @if(session()->has('success_msg'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session()->get('success_msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  @endif
  @if(session()->has('alert_msg'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session()->get('alert_msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  @endif
  @if(count($errors) > 0)
  @foreach($errors0>all() as $error)
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $error }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  @endforeach
  @endif
</div>
<div class="container">
  <diV class="row">
    <div class="col-lg-7">
      @if(\Cart::getTotalQuantity()>0)
      <h4>You have {{ \Cart::getTotalQuantity()}} Product(s) In Your Order</h4><br>
      @else
      <h4>No Product(s) In Your order</h4><br>
      <a href="{{ route('shop') }}" class="btn btn-dark">Continue Shopping</a>
      @endif
      @foreach($cartItems as $item)
      <div class="row">
        <div class="col-lg-3">
          <img src="{{ asset('storage/products/'.$item->image )}}" class="img-thumbnail" width="200" height="200">
        </div>
        <div class="col-lg-3">
          <p>
            <b>{{ $item->name }}</b><br>
          </p>
        </div>
        <div class="col-lg-3">
          <p class="font-weight-bolder"><span class="font-weight-light">Price: </span> Kshs.{{ $item->price }}</p>
        </div>
        <div class="col-lg-3">
          <p class="font-weight-bolder"><span class="font-weight-light">Sub Total: </span> Kshs.
            {{ \Cart::get($item->id)->getPriceSum() }}</p>
        </div>
      </div>
      <hr>
      @endforeach
      <br>
      @if(count($cartItems)>0)
      <div class="card">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><span class="font-weight-bold">Total: </span><span
                  class="float-right font-weight-bolder">Kshs.
              {{ \Cart::getTotal() }}</span></li>
        </ul>
      </div>
      @endif
      <div class="d-flex justify-content-end mt-3">
        <form action="{{ route('order.place') }}" method="POST">
          {{ csrf_field() }}
          <button class="btn btn-success" title="Place order">Place order</button>
        </form>
      </div>
    </diV>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Delivery To:</h5>
          <p class="card-text"><span class="font-weight-bold">Name: </span>{{ $deliverydetails->name }}</p>
          <p class="card-text"><span class="font-weight-bold">Phone Number: </span>{{ $deliverydetails->phone_number }}
          </p>
          <p class="card-text"><span class="font-weight-bold">Address: </span>{{$deliverydetails->address }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

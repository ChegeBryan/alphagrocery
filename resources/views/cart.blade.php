@extends('layouts.app')

@section('title') Mama Mboga @endsection

@section('content')
<div class="container pb-4">
  <h3 class="text-center pb-3">Cart</h3>
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
  @if(\Cart::getTotalQuantity()>0)
  <h4>You have {{ \Cart::getTotalQuantity()}} Product(s) In Your Cart</h4><br>
  @else
  <h4>No Product(s) In Your Cart</h4><br>
  <a href="/" class="btn btn-dark">Continue Shopping</a>
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
      <p>
        <b>Price: </b>Kshs.{{ $item->price }}<br>
        <b>Sub Total: </b>Kshs. {{ \Cart::get($item->id)->getPriceSum() }}<br>
      </p>
    </div>
    <div class="col-lg-3">
      <div class="row">
        <form action="{{ route('cart.update', $item->id) }}">
          @method('PATCH')
          {{ csrf_field() }}
          <div class="form-group row">
            <input type="hidden" value="{{ $item->id}}" id="id" name="id">
            <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}" id="quantity"
                   name="quantity" style="width: 70px; margin-right: 10px;">
            <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i class="fa fa-save"></i></button>
          </div>
        </form>
        <form action="{{ route('cart.destroy' , $item->id) }}" method="POST">
          @method('DELETE')
          {{ csrf_field() }}
          <input type="hidden" value="{{ $item->id }}" id="id" name="id">
          <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
        </form>
      </div>
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

  <div class="d-flex justify-content-between mt-3">
    <div>
      <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
        {{ csrf_field() }}
        <button class="btn btn-warning btn-md">Clear Cart</button>
      </form>
    </div>
    <div>
      <a href="/shop" class="btn btn-dark">Continue Shopping</a>
      <a href="/checkout" class="btn btn-success">Proceed To Checkout</a>
    </div>

  </div>
  @endif
</div>
@endsection

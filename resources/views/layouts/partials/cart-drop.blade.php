@if(count(\Cart::getContent()) > 0)
@foreach(\Cart::getContent() as $item)
<li class="list-group-item">
  <div class="row">
    <div class="col-lg-3">
      <img src="{{asset('storage/products/'.$item->image) }}" style="width: 50px; height: 50px;">
    </div>
    <div class="col-lg-6">
      <b>{{$item->name}}</b>
      <br><small>Qty: {{$item->quantity}}</small>
    </div>
    <div class="col-lg-3">
      <p>${{ \Cart::get($item->id)->getPriceSum() }}</p>
    </div>
    <hr>
  </div>
</li>
@endforeach
<br>
<li class="list-group-item">
  <div class="d-flex justify-content-between">
    <span class="font-weight-bold">Total: </span>
    <span class="font-weight-bolder">Kshs.{{ Cart::getTotal() }}</span>
  </div>
</li>
<a class="btn btn-dark btn-sm btn-block" href="{{ route('cart.index') }}">Cart</a>
<a class="btn btn-dark btn-sm btn-block" href="{{route('checkout.create')}}">Checkout</i>
</a>
@else
<li class="list-group-item">Your Cart is Empty</li>
@endif

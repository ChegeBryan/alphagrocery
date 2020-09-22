@extends('layouts.app')

@section('title') Alpha Grocery @endsection

@section('content')
<!-- Picks of the day -->
<div class="container pb-4">
  <h3 class="text-center pb-3">Shop</h3>

  @foreach($products->chunk(4) as $productchunks)
  <div class="row">
    @foreach($productchunks as $product)
    <div class="col-sm-3">
      <div class="card mb-4">
        <img src="{{ asset('storage/products/'.$product->product_image) }}" class="card-img-top" width="150px"
             height="150px" alt="...">
        <div class="card-body">
          <h6 class="card-title font-weight-bold">{{ucfirst($product->product_name)}}</h6>
          <p class="card-subtitle font-weight-bold">Ksh. {{$product->product_price}}</p>
          <span class="text-muted">per. {{$product->parameter->parameter}}</span>
          <p class="card-text">{{$product->product_description}}</p>
          <p class="card-text text-muted"><a href="{{route('shop.store', $product->store_id)}}"><i
                 class="fas fa-store"></i>&nbsp;{{$product->store->name}}</a></p>
          <form action="{{ route('cart.store') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $product->id }}" id="id" name="id">
            <input type="hidden" value="{{ $product->product_name }}" id="name" name="name">
            <input type="hidden" value="{{ $product->store->id }}" id="store" name="store">
            <input type="hidden" value="{{ $product->store->name }}" id="store_name" name="store_name">
            <input type="hidden" value="{{ $product->product_price }}" id="price" name="price">
            <input type="hidden" value="{{ $product->product_image }}" id="img" name="img">
            <input type="hidden" value="1" id="quantity" name="quantity">

            <button class="btn btn-secondary btn-sm btn-block" class="tooltip-test" title="add to cart">
              <i class="fa fa-cart-plus fa-fw"></i> Add to Cart
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endforeach

  <!-- End picks of the day -->

  <div class="d-flex justify-content-center pt-5">
    {{ $products->links() }}
  </div>
</div>

@include('layouts.partials.footer')

<script>
$(document).ready(function() {
  $('.slido').slick({
    dots: true,
    infinite: false,
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
  $('.vendors').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
})
</script>
@endsection

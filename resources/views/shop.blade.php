@extends('layouts.app')

@section('title') Mama Mboga @endsection

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
          <div class="d-flex justify-content-between">
            <span class="font-weight-bold text-dark">Ksh. {{$product->product_price}}</span>
            <a href="#" class="text-"><i class="fa fa-cart-plus fa-fw fa-2x"></i></a>
          </div>
          <span class="text-muted">per. {{$product->parameter->parameter}}</span>
          <p class="card-text">{{ucfirst($product->product_name)}}</p>
          <p class="card-text">{{$product->product_description}}</p>
          <p class="card-text text-muted"><i class="fas fa-store"></i>&nbsp;{{$product->store->name}}</p>
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


<div class="container text-center py-4">
  <h2>Mama Mboga Vegetables and Fruits</h2>
  <p class="text-muted">Explore new way of getting vegetables and fruits at your doorstep.</p>
  <div class="row">
    <div class="col-sm-4">
      <span class="fa-stack fa-5x text-muted">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-carrot fa-stack-1x"></i>
      </span>
      <p class="text-secondary">Fresh veggies & fruits.</p>
    </div>
    <div class="col-sm-4">
      <span class="fa-stack fa-5x text-muted">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-store fa-stack-1x"></i>
      </span>
      <p class="text-secondary">From a wide catalog.</p>
    </div>
    <div class="col-sm-4">
      <span class="fa-stack fa-5x text-muted">
        <i class="fa fa-circle-thin fa-stack-2x"></i>
        <i class="fa fa-truck fa-stack-1x"></i>
      </span>
      <p class="text-secondary">Delivered at your doorsteps.</p>
    </div>
  </div>
</div>


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

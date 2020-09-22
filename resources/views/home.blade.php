@extends('layouts.app')

@section('title') Alpha Grocery @endsection

@section('content')
<div class="container">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner rounded-lg">
      <div class="carousel-item active rounded-lg">
        <img src="{{ asset('images/slide1.jpg') }}" class="d-block w-100 rounded-lg" width="1110px" height="555px"
             alt="...">
      </div>
      <div class="carousel-item rounded-lg">
        <img src="{{ asset('images/slide2.jpg') }}" class="d-block w-100" width="1110px" height="555px" alt="...">
      </div>
      <div class="carousel-item rounded-lg">
        <img src="{{ asset('images/slide3.jpg') }}" class="d-block w-100 rounded-lg" width="1110px" height="555px"
             alt="...">
      </div>
      <div class="carousel-item rounded-lg">
        <img src="{{ asset('images/slide4.jpg') }}" class="d-block w-100 rounded-lg" width="1110px" height="555px"
             alt="...">
      </div>
      <div class="carousel-item rounded-lg">
        <img src="{{ asset('images/slide5.jpg') }}" class="d-block w-100 rounded-lg" width="1110px" height="555px"
             alt="...">
      </div>
      <div class="carousel-item rounded-lg">
        <img src="{{ asset('images/slide6.jpg') }}" class="d-block w-100 rounded-lg" width="1110px" height="555px"
             alt="...">
      </div>
    </div>
  </div>
</div>

<!-- Picks of the day -->
<div class="container py-4">
  <h3 class="text-center py-4">Picks of the day</h3>

  <div class="card-deck">
    @foreach($products as $product)
    <div class="card">
      <img src="{{ asset('storage/products/'.$product->product_image) }}" class="card-img-top img-fluid" width="100px"
           height="100px" alt="...">
      <div class="card-body">
        <h6 class="card-title font-weight-bold">{{ucfirst($product->product_name)}}</h6>
        <p class="card-subtitle font-weight-bold">Ksh. {{$product->product_price}}</p>
        <span class="text-muted">per. {{$product->parameter->parameter}}</span>
        <p class="card-text">{{$product->product_description}}</p>
        <p class="card-text text-muted"><i class="fas fa-store"></i>&nbsp;{{$product->store->name}}</p>
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
    @endforeach
  </div>
</div>
<!-- End picks of the day -->

<!-- Shop by category -->
<div class="container py-4">
  <h3 class="text-center py-4">Shop by category</h3>

  <div class="slido" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
    @foreach($categories as $category)
    <div>
      <img src="{{ asset('storage/categories/'.$category->category_image) }}" alt="" class="" width="150px"
           height="150px">
    </div>
    @endforeach
  </div>
</div>
<!-- End Shop by category -->

<!-- Shop by subcategory -->
<div class="container text-center py-4">
  <h3 class="text-center py-4">Shop by Subcategory</h3>

  <div class="vendors" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
    @foreach($subcategories as $subcategory)
    <div>
      <img src="{{ asset('storage/subcategories/'.$subcategory->subcategory_image) }}" alt="" class="" width="150px"
           height="150px">
    </div>
    @endforeach
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

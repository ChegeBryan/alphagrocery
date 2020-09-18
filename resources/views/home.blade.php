@extends('layouts.app')

@section('title') Mama Mboga @endsection

@section('content')
<div class="container">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/slide1.jpg') }}" class="d-block w-100 rounded-lg" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/slide1.jpg') }}" class="d-block w-100 rounded-lg" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/slide1.jpg') }}" class="d-block w-100 rounded-lg" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
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
          <input type="hidden" value="{{ $product->store->store_name }}" id="store_name" name="store_name">
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

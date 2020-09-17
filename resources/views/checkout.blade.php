@extends('layouts.app')

@section('title') Mama Mboga @endsection

@section('content')
<div class="container pb-4">
  <h3 class="text-center pb-3">Add Shipping info</h3>
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  @endif
  @if(session()->has('alert'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session()->get('alert') }}
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
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <h6 class="card-header m-0 font-weight-bold text-primary py-3">Create Product</h6>
    <!-- Card Body -->
    <div class="card-body">
      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      <br />
      @endif
      <form method="POST" action="{{ route('checkout.store') }}">
        @csrf
        <div class=" form-group">
          <label for="name">{{ __('Customer Name') }}</label>
          <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}">
        </div>
        <div class=" form-group">
          <label for="phone">{{ __('Phone Number') }}</label>
          <input type="tel" class="form-control" name="phone" id="phone">
        </div>
        <div class=" form-group">
          <label for="address">{{ __('Delivery Address') }}</label>
          <input type="text" class="form-control" name="address" id="address">
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3">
          {{ __('Add Shipping Info') }}
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
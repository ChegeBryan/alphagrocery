@extends('layouts.app')

@section('title') Grocery @endsection

@section('content')
<div class="container pb-4">
  <h3 class="text-center pb-3">Add Delivery info</h3>
</div>
<div class="container d-flex justify-content-center">
  <div class="card shadow mb-4" style="width: 20rem;">
    <!-- Card Body -->
    <div class="card-body">
      <h5 class="card-title font-weight-bold text-primary text-center">Add Delivery Information</h5>
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
      @if($errors->any())
      @foreach($errors>all() as $error)
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      @endforeach
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
          <textarea class="form-control" name="address" id="address" rows="2"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3">
          {{ __('Save Delivery Info') }}
        </button>
      </form>
    </div>
  </div>
</div>
@endsection

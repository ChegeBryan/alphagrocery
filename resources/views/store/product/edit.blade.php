@extends('store.master')

@section('title')
{{ Auth::guard('store')->user()->name }}
@endsection

@section('body')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
         class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <h6 class="card-header m-0 font-weight-bold text-primary py-3">Update Product</h6>
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
          <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class=" form-group">
              <label for="name">{{ __('Product Name') }}</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
              <label for="description">{{ __('Product Description') }}</label>
              <textarea class="form-control" rows="3" name="description">{{$product->description}}</textarea>
            </div>

            <div class="form-text">Current Subcategory: {{$product->subcategory->subcategory_name}}</div>

            <select class="custom-select mt-3" name="subcategory">
              <option selected disabled>Select the subcategory</option>
              @foreach($subcategories as $subcategory)
              <option value="{{ $subcategory->id }}">{{$subcategory->subcategory_name}}</option>
              @endforeach
            </select>

            <div class="form-text">Current Parameter: {{$product->parameter->parameter}}</div>

            <select class="custom-select my-3" name="parameter">
              <option selected disabled>Select the Parameter</option>
              @foreach($parameters as $parameter)
              <option value="{{ $parameter->id }}">{{$parameter->parameter}}</option>
              @endforeach
            </select>
            <div class=" form-group">
              <label for="price">{{ __('Product Price') }} Kshs.</label>
              <input type="number" class="form-control" name="price" id="price" value="{{$product->price}}">
            </div>
            <div class=" form-group">
              <label for="quantity">{{ __('Product Quantity') }}</label>
              <input type="number" class="form-control" name="quantity" id="quantity" value="{{$product->quantity}}">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <img class="img-fluid w-25" src="{{ asset('storage/products/'.$product->image) }}">
              </div>
              <div class="form-group col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="category_image">Update Product pic</label>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-3">
              {{ __('Update Product') }}
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
            <canvas id="myPieChart"></canvas>
          </div>
          <div class="mt-4 text-center small">
            <span class="mr-2">
              <i class="fas fa-circle text-primary"></i> Direct
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-success"></i> Social
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-info"></i> Referral
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@extends('admin.master')

@section('title')
{{ Auth::guard('admin')->user()->name }}
@endsection

@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">SubCategeory</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <h6 class="card-header m-0 font-weight-bold text-primary py-3">Create Subcategory</h6>
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
                    <form method="POST" action="{{ route('subcategory.store') }}">
                        @csrf

                        <div class=" form-group">
                            <label for="subcategory_name">{{ __('Sub-Category Name') }}</label>
                            <input type="text" class="form-control" name="subcategory_name" id="subcategory_name">
                        </div>
                        <select class="custom-select" name="category">
                            <option selected disabled>Select the category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        <div class="custom-file mt-3">
                            <input type="file" class="custom-file-input" id="subcategory_image" name="subcategory_image">
                            <label class="custom-file-label" for="subcategory_image">Choose Sub-category pic</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">
                            {{ __('Add Sub-Category') }}
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
                </div>
                <!-- Card Body -->
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

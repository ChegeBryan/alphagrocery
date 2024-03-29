@extends('admin.master')

@section('title')
{{ Auth::guard('admin')->user()->name }}
@endsection

@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <h6 class="card-header m-0 font-weight-bold text-primary py-3">Update Category</h6>
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
                    <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class=" form-group">
                            <label for="category_name">{{ __('Category Name') }}</label>
                            <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $category->category_name }}">
                        </div>
                        <div class="form-group">
                            <label for="category_description">{{ __('Category Description') }}</label>
                            <textarea class="form-control" rows="3" name="category_description">{{ $category->category_description }}</textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <img class="img-fluid w-25" src="{{ asset('storage/categories/'.$category->category_image) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="category_image" name="category_image">
                                    <label class="custom-file-label" for="category_image">Update category pic</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-3">
                            {{ __('Update Category') }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Recently Added Categories</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td><img src="{{ asset('storage/categories/'.$category->category_image )}}" alt="" class="rounded" width="50px" height="50px"></td>
                                    <td>{{$category->category_name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

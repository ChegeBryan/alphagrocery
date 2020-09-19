@extends('store.master')

@section('title')
{{ Auth::guard('store')->user()->name }}
@endsection

@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Products</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products Inventory</h6>
        </div>
        <div class="card-body">
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dt" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Quantity in Stock</th>
                            <th>Parameter</th>
                            <th>Price (Kshs.)</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td><img src="{{ asset('storage/products/'.$product->product_image )}}" alt="" class="rounded" width="75px" height="75px"></td>
                            <td>{{$product->subcategory->category->category_name}}</td>
                            <td>{{$product->subcategory->subcategory_name}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_description}}</td>
                            <td>{{$product->product_quantity}}</td>
                            <td>{{$product->parameter->parameter}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-script')
<script src="{{ asset('js/dt.js') }}"></script>
@endsection

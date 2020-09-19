@extends('admin.master')

@section('title')
{{ Auth::guard('admin')->user()->name }}
@endsection

@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categories</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product Parameters</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dt" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Associated Products</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product_parameters as $parameter)
                        <tr>
                            <td>{{$parameter->parameter}}</td>
                            <td>{{2}}</td>
                            <td>
                                <a href="{{ route('prodparameter.edit', $parameter->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('prodparameter.destroy', $parameter->id)}}" method="post">
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

@extends('admin.master')

@section('title')
{{ Auth::guard('admin')->user()->name }}
@endsection

@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Prodcut Parameter</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <h6 class="card-header m-0 font-weight-bold text-primary py-3">Update Parameter</h6>
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
                    <form method="POST" action="{{ route('prodparameter.update', $parameter->id) }}">
                        @method('PATCH')
                        @csrf

                        <div class=" form-group">
                            <label for="parameter">{{ __('Parameter Name') }}</label>
                            <input type="text" class="form-control" name="parameter" id="parameter" value="{{$parameter->parameter}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">
                            {{ __('Update Parameter') }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Recent Product Parameters</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Parameter</th>
                                    <th>Associated Products</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product_parameters as $parameter)
                                <tr>
                                    <td>{{$parameter->parameter}}</td>
                                    <td>{{$parameter->products->count()}}</td>
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

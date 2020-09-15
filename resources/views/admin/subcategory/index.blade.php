@extends('admin.master')

@section('title')
{{ Auth::guard('admin')->user()->name }}
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('body')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Subcategories</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Product Subcategories</h6>
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
              <th>Subcategory</th>
              <th>Category</th>
              <th colspan=2>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subcategories as $subcategory)
            <tr>
              <td><img src="{{ asset('images/category/'.$subcategory->subcategory_image )}}" alt=""
                     class="rounded h-25">
              </td>
              <td>{{$subcategory->subcategory_name}}</td>
              <td>{{$subcategory->category->category_name}}</td>
              <td>
                <a href="{{ route('subcategory.edit', $subcategory->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{ route('subcategory.destroy', $subcategory->id)}}" method="post">
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

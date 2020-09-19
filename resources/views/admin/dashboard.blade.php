@extends('admin.master')

@section('title')
{{ Auth::guard('admin')->user()->name }}
@endsection

@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">⚠ Under Construction</h1>

</div>
@endsection

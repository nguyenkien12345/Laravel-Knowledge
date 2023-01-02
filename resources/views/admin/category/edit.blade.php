@extends('admin.layout.master');

@section('title')
    Category - Edit
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category - <small>Edit</small></h1>
                </div>

                @if (count($errors))
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('admin.category.update', $category->category_id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="name" value="{{$category->name}}" />
                        </div>
                        <button type="submit" class="btn btn-default">Update</button>
                    <form>
                </div>
            </div>
        </div>
    </div>
@endsection

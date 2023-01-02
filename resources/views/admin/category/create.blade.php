@extends('admin.layout.master');

@section('title')
    Category - Create
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category - <small>Add</small></h1>
                </div>

                @if (count($errors))
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif

                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('admin.category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                        </div>
                        <button type="submit" class="btn btn-default">Create</button>
                    <form>
                </div>
            </div>
        </div>
    </div>
@endsection

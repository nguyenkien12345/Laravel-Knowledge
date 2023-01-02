@extends('admin.layout.master');

@section('title')
    Post - Create
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post - <small>Create</small></h1>
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
                    <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Please Enter Title: " />
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Please Enter Description: " />
                        </div>

                        <div class="form-group">
                            <label>New Post</label>
                            <input type="checkbox"  name="new_post" />
                        </div>

                        <div class="form-group">
                            <label>Highlight Post</label>
                            <input type="checkbox"  name="highlight_post" />
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" />
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="content" class="ckeditor" name="content"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Create</button>
                    <form>
                </div>
            </div>
        </div>
    </div>
@endsection

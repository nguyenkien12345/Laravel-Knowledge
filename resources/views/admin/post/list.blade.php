@extends('admin.layout.master');

@section('title')
    Post - List
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post - <small>List</small></h1>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Highlight Post</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr align="center">
                                <td>{{ $post->post_id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->description }}</td>
                                <td><img src="{{$post->imageUrl()}}" alt="{{$post->image}}" width="50px" height="auto"/></td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->highlight_post == 1 ? 'x' : ''}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.post.edit', $post->post_id)}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{{route('admin.post.delete', $post->post_id)}}">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

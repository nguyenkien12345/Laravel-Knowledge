@extends('admin.layout.master');

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('title')
    Category - List
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category - <small>List</small></h1>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr align="center">
                                <td>{{ $category->category_id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{{route('admin.category.edit',$category->category_id)}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{{route('admin.category.delete', $category->category_id)}}">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 {{-- Hiển thị thông báo với Toastr Notification --}}
 @if (Session::has('success'))
    <script>
        toastr.options = {
            "progressBar": true, // Hiển thị thanh progressBar
            "closeButton": true, // Hiển thị thanh button close
        }

        toastr.success("{{ Session::get('success') }}", "Notification", {timeout: 5000});
        toastr.info("{{ Session::get('success') }}");
        toastr.warning("{{ Session::get('success') }}");
        toastr.error("{{ Session::get('success') }}");
    </script>
 @endif

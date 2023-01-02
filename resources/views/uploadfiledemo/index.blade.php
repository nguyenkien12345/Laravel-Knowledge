<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UPLOAD FILE</title>
</head>
<body>
    <form action="{{route('handle-file')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text"   name="name" placeholder="Enter Your Full Name: " style="display: block; margin-bottom: 10px">
        <input type="number" name="age"  placeholder="Enter Your Age: " style="display: block; margin-bottom: 10px">
        <input type="file"   name="image" style="display: block; margin-bottom: 10px">
        <button type="submit" style="display: block">Submit</button>
    </form>

    @if (session('error'))
        <p style="color: red">{{session('error')}}</p>
    @endif

    @if (session('success'))
        <p style="color: red">{{session('success')}}</p>
    @endif
</body>
</html>

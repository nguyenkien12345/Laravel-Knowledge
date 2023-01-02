<form action="{{route('update-profile')}}" method="POST">
    @csrf
    @method('PUT')
    <input type="email"     value="{{auth()->user()->email}}" disabled  name="email"    style="display: block; margin-bottom: 10px">
    <input type="name"      value="{{auth()->user()->name}}"            name="name"     style="display: block; margin-bottom: 10px">
    <input type="password"  value="{{auth()->user()->password}}"        name="password" style="display: block; margin-bottom: 10px">
    <input type="checkbox"  name="change_password"                                      style="display: block; margin-bottom: 10px">
    <button type="submit">Update</button>
</form>

<a href="{{route('logout')}}" style="display: block; margin-top: 10px">Đăng xuất</a>

@if (session('success'))
    <p style="display: block; margin-bottom: 10px; color: red; front-size: 20px">{{session('success')}}</p>
@endif

@if (session('error'))
    <p style="display: block; margin-bottom: 10px; color: red; front-size: 20px">{{session('error')}}</p>
@endif

@if (count($errors))
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p style="display: block; margin-bottom: 10px; color: red; front-size: 20px">{{$error}}</p>
        @endforeach
    </div>
 @endif

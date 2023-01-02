<form action="{{route('login')}}" method="POST">
    @csrf
    <input type="email"     name="email"    placeholder="Enter Your Email: "    style="display: block; margin-bottom: 10px"/>
    <input type="password"  name="password" placeholder="Enter Your Password: " style="display: block; margin-bottom: 10px"/>
    <button type="submit">Login</button>
</form>

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

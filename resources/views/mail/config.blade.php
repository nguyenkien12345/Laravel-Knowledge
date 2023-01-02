<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LARAVEL SYSTEM EMAIL</title>
</head>
<body>
    <h1 style="text-align: center">CONFIG LARAVEL SYSTEM EMAIL</h1>
    @if (session('success'))
        <p style="text-color: red; font-size: 30px; font-weight: bold">
            {{session('success')}}
        </p>
    @endif
    <form action="/post-config-mail" method="POST">
        @csrf
        @method('POST')
        <input type="text" name='mail_host'         value="{{old('mail_host')}}"    placeholder="Enter Your MAIL_HOST: " style="display: block;"/> <br/>
        <input type="text" name='mail_port'         value="{{old('mail_port')}}"    placeholder="Enter Your MAIL_PORT: " style="display: block;"/> <br/>
        <input type="text" name='mail_username'     value="{{old('mail_username')}}"     placeholder="Enter Your MAIL_USERNAME: " style="display: block;"/> <br/>
        <input type="text" name='mail_password'     value="{{old('mail_password')}}"      placeholder="Enter Your MAIL_PASSWORD: " style="display: block;"/> <br/>
        <input type="text" name='mail_encryption'   value="{{old('mail_encryption')}}" placeholder="Enter Your MAIL_ENCRYPTION: " style="display: block;"/> <br/>
        <button type="submit">Config New System Email</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAPTCHA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <div class="container col-md-8 mt-5">

        <div class="card">
            <div class="card-header">
                <h1 class="text-danger text-center">How To Create Captcha In Laravel</h1>
            </div>

            <div class="card-body">
                <form action="{{route('send-data-captcha')}}" method="POST">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name" value="{{ old('name') }}">
                        @error('name')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email" value="{{ old('email') }}">
                        @error('email')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password" value="{{ old('password') }}">
                        @error('password')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <div class="captcha">
                            {{-- Hiển thị mã captcha --}}
                            <span>{!! captcha_img('mini') !!}</span>
                            <button type="button" class="btn btn-danger btn-reload" id="btn-reload">
                                &#x21bb;
                            </button>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" id="captcha" name="captcha" class="form-control" placeholder="Enter Your Captcha">
                        @error('captcha')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary col-md-12 mt-5 mt-3">Submit</button>
                </form>
            </div>
        </div>

    </div>

<script type="text/javascript">
    $(document).ready(function(){

        $('#btn-reload').click(function(){
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data){
                    console.log('data: ', data);
                    // REPLACE OLD CAPTCHA
                    $('.captcha span').html(data.captcha);
                },
                error: function(error){
                    console.log('error: ', error);
                }
            })
        });

    });
</script>

</body>
</html>

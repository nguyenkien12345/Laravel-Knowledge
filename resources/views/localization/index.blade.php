<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Laravel Localization</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <div class="d-flex flex-grow-1">
                {{-- Nó sẽ dựa vào language đang được set thông qua App::setLocale mà vào folder lang -> ngô ngữ language (locale) tương tứng -> file puiblic (Nơi chứa nội dung dịch (ta tự đặt tên cho folder này)) -> key --}}
                <a href="#" class="navbar-brand">@lang('public.localization')</a>
                <div class="w-100 text-right">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>

            <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
                <ul class="navbar-nav ml-auto flex-nowrap">
                    <li class="nav-item text-white p-2"><a href="" class="btn text-white">@lang('public.gallery')</a></li>
                    <li class="nav-item text-white p-2"><a href="" class="btn text-white">@lang('public.contact')</a></li>
                    <li class="nav-item text-white p-2"><a href="" class="btn text-white">@lang('public.about')</a></li>
                    <li class="nav-item text-white p-2"><a href="" class="btn text-white">@lang('public.service')</a></li>
                    <li class="nav-item text-white p-2"><a href="" class="btn text-white">@lang('public.policy')</a></li>
                </ul>

                <ul class="navbar-nav ml-auto flex-nowrap">
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle text-danger" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            Language
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{-- Khi route locale được gọi thì language tương ứng sẽ được chọn --}}
                            <a href="locale/en" id="locale-en" class="dropdown-item">English</a>
                            <a href="locale/zn" id="locale-zn" class="dropdown-item">Chinese</a>
                            <a href="locale/de" id="locale-de" class="dropdown-item">German</a>
                            <a href="locale/pt" id="locale-pt" class="dropdown-item">Brazil</a>
                            <a href="locale/ko" id="locale-ko" class="dropdown-item">Korean</a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</body>
</html>

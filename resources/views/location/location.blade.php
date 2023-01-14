<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>GET INFORMATION ABOUT LOCATION OF USER IN LARAVEL</title>
</head>
<body>
    <div class="container pt-4">
        <h1 class="text-danger d-flex justify-content-center">HOW TO GET LOCATION INFORMATION WITH IP ADDRESS IN LARAVEL</h1>
        <div class="d-flex justify-content-center">
            <div class="pt-1">
                @if($location)
                    <p><b class="px-4">Ip Address: </b> {{ $location->ip }} </p>
                    <p><b class="px-4">Country Name: </b> {{ $location->countryName }} </p>
                    <p><b class="px-4">Country Code: </b> {{ $location->countryCode }} </p>
                    <p><b class="px-4">Region Name: </b> {{ $location->regionName }} </p>
                    <p><b class="px-4">Region Code: </b> {{ $location->regionCode }} </p>
                    <p><b class="px-4">City Name: </b> {{ $location->zipCode }} </p>
                    <p><b class="px-4">Zip Code: </b> {{ $location->zipCode }} </p>
                    <p><b class="px-4">Latidude: </b> {{ $location->latitude }} </p>
                    <p><b class="px-4">Longitude: </b> {{ $location->longitude }} </p>
                    <p><b class="px-4">Area Code: </b> {{ $location->areaCode }} </p>
                    <p><b class="px-4">Timezone: </b> {{ $location->timezone }} </p>
                @else
                    <p><b>Not Found Data. Please Try Again</b></p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>

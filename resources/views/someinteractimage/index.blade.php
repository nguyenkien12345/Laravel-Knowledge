<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SOME INTERACT WITH IMAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

    <style>
        .progress {
        }

        .progress .bar {
            background: yellow;
        }

        .progress .percent {
            position: absolute;
            top: 62%;
            left: 50%;
            font-size: 20px;
            font-weight: 600;
            color: #ccc;
        }
    </style>

<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4"></div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-danger text-center">Compress Image</h1>
                </div>

                <div class="card-body">
                    <form action="{{route('compress-image')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" id="file" name="file" class="form-control">
                        </div>
                        {{-- Hiển thị loading progressbar --}}
                        <div class="progress mt-3 mb-3 p-3">
                            <div class="bar"></div>
                            <div class="percent">0%</div>
                        </div>
                        <button type="submit" class="btn btn-success btn-upload">Submit Image</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // Get Element bar and Element percent
        let bar = $('.bar');
        let percent = $('.percent');

        $('form').ajaxForm({
            beforeSend: function(){
                let percentValue = '0%';
                // Change css element
                bar.width(percentValue);
                percent.html(percentValue);
            },
            uploadProgress: function(event, position, total, percentLoad){
                let percentValue = percentLoad + '%';
                // Change css element
                bar.width(percentValue);
                percent.html(percentValue);
            },
            complete: function(){
                console.log('Compress Image Successfully');
                alert('Compress Image Successfully');
                window.location.href = "{{ url('some-interact-image') }}"
            },
        });
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>MULTI STEP FROM</title>
</head>

<style>
    .form-section{
        display: none;
    }

    .form-section.current{
        display: inline;
    }

    .parsley-errors-list{
        color: red;
        background: yellow;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">

                <div class="card px-5 py-3 mt-5 shadow">

                    <h1 class="text-danger text-center mt-3 mb-4">Multi-step From In Laravel 9</h1>

                    <div class="nav nav-fill my-3">
                        <label class="nav-link shadow-sm step0 border ml-2">Step One</label>
                        <label class="nav-link shadow-sm step1 border ml-2">Step Two</label>
                        <label class="nav-link shadow-sm step2 border ml-2">Step Three</label>
                    </div>

                    <form action="/post-multistep" method="POST" class="employee-form">
                        @csrf
                        <div class="form-section">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control mb-3" name="first_name" id="first_name" required>
                            <label for="last_name">First Name:</label>
                            <input type="text" class="form-control mb-3" name="last_name" id="last_name" required>
                            <label for="age">Age:</label>
                            <input type="number" class="form-control mb-3" name="age" id="age" required>
                        </div>
                        <div class="form-section">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control mb-3" name="phone" id="phone" required>
                            <label for="email">Email:</label>
                            <input type="text" class="form-control mb-3" name="email" id="email" required>
                        </div>
                        <div class="form-section">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control mb-3" name="address" id="address" required>
                            <label for="description">Description:</label>
                            <input type="text" class="form-control mb-3" name="description" id="description" required>
                        </div>
                        <div class="form-navigation mt-3">
                            <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
                            <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
                            <button type="submit" class="btn btn-success float-right">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        // Lấy ra toàn bộ các class form-section
        const sectionForms = $('.form-section');

        // Lấy ra vị trí hiện tại của phần tử form-section (Màn hình đang ở step mấy);
        function currentIndex(){
            return sectionForms.index(sectionForms.filter('.current'));
        }

        function navigateTo(index){
            sectionForms.removeClass('current').eq(index).addClass('current');

            // Nút lùi lại (back) chỉ xuát hiện khi index lớn hơn 0 (step 2, step 3)
            let conditionPrevious = index > 0;
            $('.form-navigation .previous').toggle(conditionPrevious);
            // Nút tiến lên (next) chỉ xuát hiện khi index khác không phải là phần tử cuối cùng (step 1, step 2)
            let conditionNext = !(index >= sectionForms.length - 1);
            $('.form-navigation .next').toggle(conditionNext);
            // Nút submit chỉ xuất hiện khi màn hình ở step cuối cùng (step 3)
            $('.form-navigation [type=submit]').toggle(!conditionNext);

            let step = $(`.step${index}`);
            step.style.background='#17a2b8';
            step.style.color='white';
        }

        $('.form-navigation .previous').click(function(){
            navigateTo(currentIndex() - 1);
        })

        $('.form-navigation .next').click(function(){
            $('.employee-form').parsley().whenValidate({
                group: 'block-' + currentIndex()
            }).done(function(){
                navigateTo(currentIndex() + 1);
            })
        });

        sectionForms.each(function(index, section){
            $(section).find(':input').attr('data-parsley-group', 'block-' + index);
        })

        navigateTo(0);
    </script>
</body>
</html>

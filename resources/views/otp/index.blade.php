<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP FIREBASE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-12">
            <form action="">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="+84 123456789">
                </div>
                {{-- Hiển thị captcha (Lưu ý: Thẻ div hiển thị ra mã captcha bắt buộc phải đặt thuộc tính id là recaptha-container) --}}
                <div id="recaptha-container"></div>
                <button type="button" onclick="sendOTP()">Send OTP</button>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <form action="">
                <div class="form-group">
                    <label for="otp">OTP</label>
                    <input type="text" id="otp" name="otp">
                </div>
                <button type="button" onclick="verifyOTP()">Verify OTP</button>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div><span class="alert alert-success" id="txtMessage" style="display: none"></span></div>
            <div><span class="alert alert-danger" id="txtError" style="display: none"></span></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-database.js"></script>
<script type="text/javascript">
    const firebaseConfig = {
        apiKey: "AIzaSyCnEjzLPaVvfcyEj9Hp6tL7eO8w8BMkB50",
        authDomain: "laravel-voyager-7be08.firebaseapp.com",
        projectId: "laravel-voyager-7be08",
        storageBucket: "laravel-voyager-7be08.appspot.com",
        messagingSenderId: "589628035036",
        appId: "1:589628035036:web:c882c5eb6798d8ba2cc919",
        measurementId: "G-YZSPP5MQ6C"
    };
    firebase.initializeApp(firebaseConfig);
</script>

<script type="text/javascript">
    window.onload = function(){
        render();
    }

    // Hiển thị mã captcha
    function render(){
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptha-container');
        recaptchaVerifier.render();
    }

    // Gửi mã OTP
    function sendOTP(){
        let phone = $('#phone').val();

        if (!phone) alert('Please Enter Your Phone');

        // SEND OTP TO PHONE
        firebase.auth().signInWithPhoneNumber(phone, window.recaptchaVerifier)
        .then(function(data){
            console.log('data send otp: ', data);
            window.confirmationResult = data;
            coderesult = data;
            // data:  ec {verificationId: 'AIndW9DjLZupa4wM5JuyKpEJfv0BLQcllPWBtGQ8j6-Sk0--Rm…Tw6Ur8tFQCa45HBBwC0T8UhcjfHc9rmMzxRUwYwX8rXzgeJ5Q', a: ƒ}
            // coderesult:  ec {verificationId: 'AIndW9DjLZupa4wM5JuyKpEJfv0BLQcllPWBtGQ8j6-Sk0--Rm…Tw6Ur8tFQCa45HBBwC0T8UhcjfHc9rmMzxRUwYwX8rXzgeJ5Q', a: ƒ}
            $('#txtMessage').text('Message Sent Successfully');
            $('#txtMessage').show();
        })
        .catch(function(error){
            $('#txtError').text('Message Sent Failure: ' + error.message);
            $('#txtError').show();
        })
    }

    // Xác thực OTP
     function verifyOTP(){
        let otp = $('#otp').val();

        if (!otp) alert('Please Enter Your OTP');

        // Kiểm tra verification code
        coderesult.confirm(otp)
        .then(function(data){
            console.log('data verify otp: ', data);
            let user = data.user;
            $('#txtMessage').text('Register Successfully');
            $('#txtMessage').show();
        })
        .catch(function(error){
            $('#txtError').text('Register Failure: ' + error.message);
            $('#txtError').show();
        })
    }
</script>

</body>
</html>
